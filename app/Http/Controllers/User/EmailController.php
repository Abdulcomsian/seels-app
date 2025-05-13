<?php

namespace App\Http\Controllers\User;

use App\Models\{EmailFormat, Compaign};
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class EmailController extends Controller
{
    public function index()
    {
        $userId = Auth::user()->id;
        $campaigns = Compaign::where('user_id', $userId)->get();
        return view('user.emails.index', compact('userId', 'campaigns'));
    }
}
