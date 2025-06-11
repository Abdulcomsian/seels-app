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
    
  $campaignIds = $campaigns->pluck('id');
    $emailFormat = EmailFormat::whereIn('compaign_id', $campaignIds)->get();
    
    return view('user.emails.index', compact('userId', 'campaigns', 'emailFormat'));
}


    public function getEmailFormatOfUserByCampaignId($userId, $campaignId)
    {

        $emailFormat = EmailFormat::with('comments')->where(['user_id' => $userId, 'compaign_id' => $campaignId])->get();
        $html = view('components.user.user-emails', ['data' => $emailFormat])->render();
        return response()->json(['status' => !empty($emailFormat) ? true : false, 'data' => $html]);

    }


}
