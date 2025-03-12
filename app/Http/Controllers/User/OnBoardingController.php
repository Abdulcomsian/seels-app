<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;

class OnBoardingController extends Controller
{
    public function index()
    {
        return view('user.onboarding.index');
    }
}
