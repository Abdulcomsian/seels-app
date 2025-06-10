<?php

namespace App\Http\Controllers\User;

use App\Models\{EmailFormat, Compaign};
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class EmailController extends Controller
{
    // public function index()
    // {
    //     $userId = Auth::user()->id;
    //     $campaigns = Compaign::where(['user_id' => $userId, 'status' => 'active'])->get();
    //     // $emailFormats = EmailFormat::with('comments')->get();
    //       $campaignIds = $campaigns->pluck('id');
    // $emailFormats = EmailFormat::whereIn('compaign_id', $campaignIds)->with('comments')->get();
    //     return view('user.emails.index', compact('userId', 'campaigns' ,'emailFormats'));
    // }

    public function index()
{
    $userId = Auth::user()->id;
    $campaigns = Compaign::where(['user_id' => $userId, 'status' => 'active'])->get();
    
    // Get the first campaign or a specific one
    $campaign = $campaigns->first();
    $campaignId = $campaign ? $campaign->id : null;
    
    $emailFormats = EmailFormat::with('comments')
        ->when($campaignId, function($query) use ($campaignId) {
            return $query->where('compaign_id', $campaignId);
        })
        ->get();
    
    return view('user.emails.index', compact('userId', 'campaigns', 'emailFormats', 'campaignId'));
}
}
