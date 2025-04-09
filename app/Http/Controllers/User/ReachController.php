<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;

class ReachController extends Controller
{
    public function index()
    {
        return view('user.reach.index');
    }
}
