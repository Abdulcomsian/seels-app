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
        $compaigns = Compaign::where(['user_id'=> $userId, 'status' => 'active'])->get();
        if ($request->ajax()) {
            $leadsQuery = Lead::where('user_id', $userId)->where('compaign_id', $request->campaignId);
        if ($request->has('search') && !empty($request->search)) {
            $search = $request->search;

                $leadsQuery->where(function ($query) use ($search) {
                    $query->where('first_name', 'LIKE', "%$search%")
                        ->orWhere('last_name', 'like', "%{$search}%")
                        ->orWhere('email', 'like', "%{$search}%")
                        ->orWhere('company', 'like', "%{$search}%")
                        // ->orWhere('city', 'like', "%{$search}%")
                        // ->orWhere('industry', 'like', "%{$search}%")
                        // ->orWhere('website', 'like', "%{$search}%")
                        // ->orWhere('title', 'like', "%{$search}%")
                        ->orWhere('corporate_phone', 'like', "%{$search}%");
                        // ->orWhere('status', 'like', "%{$search}%");
                });
        }
            $leads = $leadsQuery->orderBy('first_name', 'asc')->paginate(10);


            return response()->json([
                'data' => view('partials.leads_table', compact('leads'))->render(),
                'pagination' => view('partials.pagination.customer_leads_table', compact('leads'))->render()
            ]);
        }

        return view('user.build.index', compact('compaigns'));
    }

    public function store(Request $request)
    {
        Lead::where('user_id', auth()->id())->update(['status' => '0']);
        Lead::whereIn('id', $request->checkedLeads)->update(['status' => '1']);

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
