<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Http;
use Illuminate\Http\Request;

class WoodpeckerController extends Controller
{
    public function fetchData()
    {
        $apiKey = "114414.1534a269a8b28d1c1ad6ea05485752abc420f1d3b826fc74b1ec6e5678a90f3a";
        $url = "https://api.woodpecker.co/rest/v1/campaign_list"; // Correct endpoint for campaigns

        $response = Http::withHeaders([
            'Authorization' => "Bearer $apiKey",
            'Content-Type'  => 'application/json',
        ])->get($url);

        if ($response->successful()) {
            return response()->json($response->json(), 200);
        }

        return response()->json([
            'error' => 'Failed to fetch data',
            'status' => $response->status(),
            'message' => $response->body() // Helps debug the exact error
        ], $response->status());
    }
}
