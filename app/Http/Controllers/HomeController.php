<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use App\Jobs\UpdateCampaignTotals;
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
        if ($isAdmin) {
            return view('admin.dashboard');
        }

        $cacheKey = 'campaign_totals_' . Auth::id();
        $data = Cache::get($cacheKey);
        $shouldFetchFresh = !$data || $this->isZeroData($data['latest_totals']);

        if ($shouldFetchFresh) {
            $data = $this->getFallbackData();

            // Dispatch background job to fetch fresh campaign data
            UpdateCampaignTotals::dispatch($cacheKey, Auth::id());
        }

        $totals = $data['latest_totals'];
        $isFallback = $shouldFetchFresh;

        return view('auth.pages.dashboard', compact('totals', 'isFallback'));
    }

    public function getCampaignTotals()
    {
        $cacheKey = 'campaign_totals_' . Auth::id();
        $totals = Cache::get($cacheKey, function () {
            return $this->getFallbackData();
        });

        return response()->json($totals);
    }

    public function refreshCampaignTotals()
    {
        $cacheKey = 'campaign_totals_' . Auth::id();

        // Dispatch sync (immediate) job or run fetch directly if needed
        UpdateCampaignTotals::dispatchSync($cacheKey, Auth::id());

        $totals = Cache::get($cacheKey, $this->getFallbackData());

        return response()->json($totals);
    }

    private function isZeroData(array $totals): bool
    {
        foreach ($totals as $value) {
            if ($value !== 0) {
                return false;
            }
        }
        return true;
    }

    private function getFallbackData(): array
    {
        $totals = [
            'emails_sent' => 100,
            'delivered' => 90,
            'views' => 50,
            'bounces' => 5,
            'replies' => 20,
            'interested' => 10,
            'maybe_later' => 5,
            'not_interested' => 5,
        ];

        return [
            'graph_data' => $this->generateGraphData($totals),
            'latest_totals' => $totals,
        ];
    }

    private function generateGraphData(array $totals): array
    {
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
            $fraction = ($i + 1) / 10;
            $historicalData['months'][] = $month->format('M Y');

            foreach ($totals as $key => $value) {
                $historicalData[$key][] = round($value * $fraction);
            }
        }

        return $historicalData;
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
