<?php

namespace App\Http\Controllers\User;

use App\Models\Compaign;
use App\Http\Controllers\Controller;

class ReachController extends Controller
{
    public function index()
    {
        $compaigns = Compaign::all();
        return view('user.reach.index', compact('compaigns'));
    }
}
