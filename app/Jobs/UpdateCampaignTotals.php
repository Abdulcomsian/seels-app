<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Cache;
use App\Models\User;
use Illuminate\Support\Facades\Http;

class UpdateCampaignTotals implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    protected $cacheKey;
    protected $userId;

    public function __construct($cacheKey, $userId)
    {
        $this->cacheKey = $cacheKey;
        $this->userId = $userId;
    }

    public function handle()
    {
        $user = User::find($this->userId);
        if (!$user || !$user->userKey) return;

        $apiKey = $user->userKey->key;

        $campaignListUrl = 'https://api.woodpecker.co/rest/v1/campaign_list';
        $headers = ['x-api-key' => $apiKey];
        $campaignsResponse = Http::withHeaders($headers)->get($campaignListUrl);

        if (!$campaignsResponse->successful()) return;

        $campaigns = $campaignsResponse->json();
        $totals = [
            'emails_sent' => 0,
            'delivered' => 0,
            'views' => 0,
            'bounces' => 0,
            'replies' => 0,
            'interested' => 0,
            'maybe_later' => 0,
            'not_interested' => 0,
        ];

        foreach ($campaigns as $campaign) {
            $campaignId = $campaign['id'];
            $summaryUrl = "https://api.woodpecker.co/rest/v1/campaign_list?id={$campaignId}";
            $summaryResponse = Http::withHeaders($headers)->get($summaryUrl);

            if (!$summaryResponse->successful()) continue;

            $campaignData = $summaryResponse->json();
            if (!empty($campaignData[0]['stats'])) {
                $stats = $campaignData[0]['stats'];

                $totals['emails_sent'] += $stats['sent'] ?? 0;
                $totals['delivered'] += $stats['delivery'] ?? 0;
                $totals['views'] += $stats['opened'] ?? 0;
                $totals['bounces'] += $stats['bounced'] ?? 0;
                $totals['replies'] += $stats['replied'] ?? 0;
                $totals['interested'] += $stats['interested'] ?? 0;
                $totals['maybe_later'] += $stats['maybe_later'] ?? 0;
                $totals['not_interested'] += $stats['not_interested'] ?? 0;
            }
        }

        // Build historicalData...
        $historicalData = [
            'months' => [],
            'emails_sent' => [],
            'delivered' => [],
            'views' => [],
            'bounces' => [],
            'replies' => [],
            'interested' => [],
            'maybe_later' => [],
            'not_interested' => [],
        ];

        $now = now();
        for ($i = 9; $i >= 0; $i--) {
            $month = $now->copy()->subMonths($i);
            $historicalData['months'][] = $month->format('M Y');

            $fraction = ($i + 1) / 10;
            $historicalData['emails_sent'][] = round($totals['emails_sent'] * $fraction);
            $historicalData['delivered'][] = round($totals['delivered'] * $fraction);
            $historicalData['views'][] = round($totals['views'] * $fraction);
            $historicalData['bounces'][] = round($totals['bounces'] * $fraction);
            $historicalData['replies'][] = round($totals['replies'] * $fraction);
            $historicalData['interested'][] = round($totals['interested'] * $fraction);
            $historicalData['maybe_later'][] = round($totals['maybe_later'] * $fraction);
            $historicalData['not_interested'][] = round($totals['not_interested'] * $fraction);
        }

        $freshData = [
            'graph_data' => $historicalData,
            'latest_totals' => $totals
        ];

        Cache::put($this->cacheKey, $freshData, now()->addMinutes(5));
    }
}
