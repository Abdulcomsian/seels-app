<?php

namespace App\Http\Controllers\User;

use App\Models\Lead;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class BuildController extends Controller
{
    public function index()
    {
        $userId = Auth::id();
        $leads = Lead::where('user_id', $userId)->paginate(10); // Paginate with 10 leads per page
        $totalCount = Lead::where('user_id', $userId)->count(); // Get total count

        return view('user.build.index', compact('leads', 'totalCount'));
    }
}
