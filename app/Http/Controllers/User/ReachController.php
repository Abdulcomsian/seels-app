<?php

namespace App\Http\Controllers\User;

use App\Models\Compaign;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Cache;
use Illuminate\Pagination\LengthAwarePaginator;

class ReachController extends Controller
{
    public function index()
    {
        $user = Auth::user();
        $searchTerm = request()->get('search');
        $apiKey = $user->userKey->key;
        $headers = ['x-api-key' => $apiKey];

        // Get all campaigns (cached or fresh)
        $allCampaigns = Cache::remember("woodpecker_campaigns_user_{$user->id}", now()->addMinutes(10), function () use ($headers) {
            $campaignListUrl = 'https://api.woodpecker.co/rest/v1/campaign_list';
            $campaignsResponse = Http::withHeaders($headers)->get($campaignListUrl);
            return $campaignsResponse->json();
        });

        // Apply search filter if search term exists
        if ($searchTerm) {
            $filteredCampaigns = array_filter($allCampaigns, function ($campaign) use ($searchTerm) {
                return stripos($campaign['name'], $searchTerm) !== false ||
                    stripos($campaign['from_name'], $searchTerm) !== false ||
                    stripos($campaign['from_email'], $searchTerm) !== false;
            });

            // Get stats for filtered campaigns (without pagination)
            $campaignsWithStats = $this->getCampaignsWithStats($user, array_values($filteredCampaigns), $headers);

            return view('user.reach.index', [
                'campaigns' => $campaignsWithStats,
                'localCompaignsData' => Compaign::all(),
                'isSearch' => true
            ]);
        }

        // Normal paginated flow
        $perPage = 4;
        $currentPage = request()->get('page', 1);
        $offset = ($currentPage - 1) * $perPage;
        $paginatedCampaigns = array_slice($allCampaigns, $offset, $perPage);

        $campaignsWithStats = $this->getCampaignsWithStats($user, $paginatedCampaigns, $headers);

        $paginator = new LengthAwarePaginator(
            $campaignsWithStats,
            count($allCampaigns),
            $perPage,
            $currentPage,
            [
                'path' => request()->url(),
                'query' => request()->query()
            ]
        );

        return view('user.reach.index', [
            'campaigns' => $paginator,
            'localCompaignsData' => Compaign::all(),
            'isSearch' => false
        ]);
    }

    private function getCampaignsWithStats($user, $campaigns, $headers)
    {
        $campaignsWithStats = [];
        $client = new \GuzzleHttp\Client();
        $promises = [];

        foreach ($campaigns as $campaign) {
            $campaignId = $campaign['id'];
            $cacheKey = "woodpecker_campaign_stats_{$campaignId}_user_{$user->id}";

            if (Cache::has($cacheKey)) {
                $campaign['stats'] = Cache::get($cacheKey);
                $campaignsWithStats[] = $campaign;
            } else {
                $summaryUrl = "https://api.woodpecker.co/rest/v1/campaign_list?id={$campaignId}";
                $promises[$campaignId] = $client->getAsync($summaryUrl, [
                    'headers' => $headers
                ]);
            }
        }

        if (!empty($promises)) {
            $responses = \GuzzleHttp\Promise\Utils::settle($promises)->wait();

            foreach ($campaigns as $campaign) {
                $campaignId = $campaign['id'];
                $cacheKey = "woodpecker_campaign_stats_{$campaignId}_user_{$user->id}";

                if (isset($responses[$campaignId]) && $responses[$campaignId]['state'] === 'fulfilled') {
                    $response = $responses[$campaignId]['value'];
                    $campaignStatsData = json_decode($response->getBody(), true);
                    $stats = $campaignStatsData[0]['stats'] ?? [
                        'delivery' => 0,
                        'prospects' => 0,
                        'opened' => 0,
                        'replied' => 0,
                        'interested' => 0,
                        'maybe_later' => 0,
                        'not_interested' => 0
                    ];

                    Cache::put($cacheKey, $stats, now()->addMinutes(10));
                    $campaign['stats'] = $stats;
                    $campaignsWithStats[] = $campaign;
                }
            }
        }

        return $campaignsWithStats;
    }
}
