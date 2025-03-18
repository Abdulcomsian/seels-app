<?php

namespace App\Http\Controllers\User;

use App\Models\EmailFormat;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class EmailController extends Controller
{
    public function index()
    {
        $userEmail = EmailFormat::where('user_id', Auth::user()->id)->first();
        return view('user.emails.index', compact('userEmail'));
    }
}
