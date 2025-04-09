<?php

namespace App\Http\Controllers\User;

use App\Models\Lead;
use App\Models\Compaign;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class BuildController extends Controller
{
    public function index(Request $request)
    {
        $userId = Auth::id();
        $compaigns = Compaign::all();

        if ($request->has('search') && !empty($request->search)) {
            $search = $request->search;
            $leads = Lead::where('user_id', $userId)
                ->where(function ($query) use ($search) {
                    $query->where('email', 'LIKE', "%$search%")
                        ->orWhere('first_name', 'LIKE', "%$search%")
                        ->orWhere('last_name', 'LIKE', "%$search%")
                        ->orWhere('company', 'LIKE', "%$search%");
                })->paginate(10);
        } else {
            $leads = Lead::where('user_id', $userId)->paginate(10);
        }

        if ($request->ajax()) {
            return view('partials.leads_table', compact('leads'))->render();
        }

        return view('user.build.index', compact('leads','compaigns'));
    }

    public function store(Request $request)
    {
        Lead::where('user_id', auth()->id())->update(['status' => '0']); // Reset all to 0
        Lead::whereIn('id', $request->checkedLeads)->update(['status' => '1']); // Set checked to 1

        return response()->json(['message' => 'Leads updated successfully!']);
    }

    public function getUserLeadsByCompaign($id)
    {
        $userId = Auth::id();

        if ($id == 0) {
            $leads = Lead::where('user_id', $userId)->get();
        } else {
            $leads = Lead::where('compaign_id', $id)
                ->where('user_id', $userId)
                ->get();
        }

        return response()->json(['leads' => $leads]);
    }
}
