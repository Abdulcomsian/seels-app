<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Http;
use Illuminate\Http\Request;

class WoodpeckerController extends Controller
{
    public function getCampaignStats()
    {
        $apiKey = "114414.1534a269a8b28d1c1ad6ea05485752abc420f1d3b826fc74b1ec6e5678a90f3a";
        $campaignListUrl = "https://api.woodpecker.co/rest/v1/campaign_list";

        $headers = [
            // 'Authorization' => "Bearer $apiKey",
            // 'Content-Type'  => 'application/json',
            'x-api-key'     => $apiKey
        ];

        // Get list of campaigns
        $campaignsResponse = Http::withHeaders($headers)->get($campaignListUrl);

        if (!$campaignsResponse->successful()) {
            return response()->json(['error' => 'Failed to fetch campaigns'], 500);
        }

        $campaigns = $campaignsResponse->json();
        // dd($campaigns);
        $totals = [
            'emails_sent' => 0,
            'delivered'   => 0,
            'views'       => 0,
            'bounces'     => 0,
            'replies'     => 0,
        ];

        foreach ($campaigns as $campaign) {
            $campaignId = $campaign['id'];
            $summaryUrl = "https://api.woodpecker.co/rest/v1/campaign_list?id={$campaignId}";

            $summaryResponse = Http::withHeaders($headers)->get($summaryUrl);

            if (!$summaryResponse->successful()) {
                logger("Error fetching summary for campaign {$campaignId}: " . $summaryResponse->body());
                continue;
            }

            $campaignData = $summaryResponse->json();

            // This returns an array of campaigns, so we need to take the first element
            if (!empty($campaignData[0]['stats'])) {
                $stats = $campaignData[0]['stats'];

                $totals['emails_sent'] += $stats['sent'] ?? 0;
                $totals['delivered']   += $stats['delivery'] ?? 0;
                $totals['views']       += $stats['opened'] ?? 0;
                $totals['bounces']     += $stats['bounced'] ?? 0;
                $totals['replies']     += $stats['replied'] ?? 0;
            }
        }
dd($totals);
        return response()->json($totals);
    }
}
