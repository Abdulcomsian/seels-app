<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;

class BuildController extends Controller
{
    public function index()
    {
        return view('user.build.index');
    }
}
