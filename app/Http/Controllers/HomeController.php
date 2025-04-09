<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Cache;

class HomeController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $isAdmin = Auth::user()->hasRole('admin');
        if($isAdmin) {
            return view('admin.dashboard');
        }
        
        $cacheKey = 'campaign_totals';
        $totals = Cache::get($cacheKey);

        if (!$totals) {
            $totals = $this->getFallbackData();

            // Queue a background job to fetch fresh data
            \Illuminate\Support\Facades\Queue::push(function () use ($cacheKey) {
                $freshData = $this->fetchCampaignData();
                Cache::put($cacheKey, $freshData, now()->addDays(30));
            });
        }

        // Pass a flag to indicate if we're using fallback data
        $isFallback = !Cache::has($cacheKey);

        $cacheKey = 'campaign_totals';
        $data = Cache::get($cacheKey);

        if (!$data) {
            $data = $this->getFallbackData();

            // Queue a background job to fetch fresh data
            \Illuminate\Support\Facades\Queue::push(function () use ($cacheKey) {
                $freshData = $this->fetchCampaignData();
                Cache::put($cacheKey, $freshData, now()->addDays(30));
            });
        }

        $totals = $data['latest_totals'];
        $isFallback = !Cache::has($cacheKey);


        return view('auth.pages.dashboard', compact('totals', 'isFallback'));
    }

    public function getCampaignTotals()
    {
        $cacheKey = 'campaign_totals';
        $totals = Cache::get($cacheKey, function () {
            return $this->getFallbackData();
        });

        return response()->json($totals);
    }

    public function refreshCampaignTotals()
    {
        $cacheKey = 'campaign_totals';
        $totals = $this->fetchCampaignData();
        Cache::put($cacheKey, $totals, now()->addDays(30));
        return response()->json($totals);
    }

    private function fetchCampaignData()
    {
        $user = Auth::user();
        $apiKey = $user->userKey->key;

        $campaignListUrl = 'https://api.woodpecker.co/rest/v1/campaign_list';
        $headers = ['x-api-key' => $apiKey];

        $campaignsResponse = Http::withHeaders($headers)->get($campaignListUrl);

        if (!$campaignsResponse->successful()) {
            return $this->getFallbackData();
        }

        $campaigns = $campaignsResponse->json();
        $totals = [
            'emails_sent' => 0,
            'delivered'   => 0,
            'views'       => 0,
            'bounces'     => 0,
            'replies'     => 0,
            'interested'  => 0,
            'maybe_later' => 0,
            'not_interested' => 0,
        ];

        foreach ($campaigns as $campaign) {
            $campaignId = $campaign['id'];
            $summaryUrl = "https://api.woodpecker.co/rest/v1/campaign_list?id={$campaignId}";
            $summaryResponse = Http::withHeaders($headers)->get($summaryUrl);

            if (!$summaryResponse->successful()) {
                continue;
            }

            $campaignData = $summaryResponse->json();
            if (!empty($campaignData[0]['stats'])) {
                $stats = $campaignData[0]['stats'];

                $totals['emails_sent'] += $stats['sent'] ?? 0;
                $totals['delivered']   += $stats['delivery'] ?? 0;
                $totals['views']       += $stats['opened'] ?? 0;
                $totals['bounces']     += $stats['bounced'] ?? 0;
                $totals['replies']     += $stats['replied'] ?? 0;
                $totals['interested']  += $stats['interested'] ?? 0;
                $totals['maybe_later'] += $stats['maybe_later'] ?? 0;
                $totals['not_interested'] += $stats['not_interested'] ?? 0;
            }
        }

        $historicalData = [
            'months' => [],
            'emails_sent' => [],
            'delivered' => [],
            'views' => [],
            'bounces' => [],
            'replies' => [],
            'interested' => [],
            'maybe_later' => [],
            'not_interested' => []
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

        return [
            'graph_data' => $historicalData,
            'latest_totals' => $totals
        ];
    }

    private function getFallbackData()
    {
        $totals = [
            'emails_sent' => 100,
            'delivered'   => 90,
            'views'       => 50,
            'bounces'     => 5,
            'replies'     => 20,
            'interested'  => 10,
            'maybe_later' => 5,
            'not_interested' => 5,
        ];

        $historicalData = [
            'months' => [],
            'emails_sent' => [],
            'delivered' => [],
            'views' => [],
            'bounces' => [],
            'replies' => [],
            'interested' => [],
            'maybe_later' => [],
            'not_interested' => []
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

        return [
            'graph_data' => $historicalData,
            'latest_totals' => $totals
        ];
    }

    public function logout()
    {
        Auth::logout();
        return redirect()->route('welcome');
    }

    public function changePassword()
    {
        return view('auth.passwords.change-password');
    }

    public function updatePassword(Request $request)
    {
        $request->validate([
            'old_password' => 'required',
            'new_password' => 'required|confirmed',
        ]);

        if (!Hash::check($request->old_password, auth()->user()->password)) {
            return back()->with("error", "Old Password Doesn't match!");
        }

        User::whereId(auth()->user()->id)->update([
            'password' => Hash::make($request->new_password)
        ]);

        return back()->with("status", "Password changed successfully!");
    }
}
