<?php

namespace App\Http\Controllers\User;

use App\Models\Lead;
use Illuminate\Http\Request;
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

    public function store(Request $request)
    {
        Lead::where('user_id', auth()->id())->update(['status' => '0']); // Reset all to 0
        Lead::whereIn('id', $request->checkedLeads)->update(['status' => '1']); // Set checked to 1

        return response()->json(['message' => 'Leads updated successfully!']);
    }
}
