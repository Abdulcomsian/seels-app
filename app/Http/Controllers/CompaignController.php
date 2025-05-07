<?php

namespace App\Http\Controllers;

use Exception;
use App\Models\Compaign;
use App\Models\User;
use Illuminate\Http\Request;

class CompaignController extends Controller
{
    public function index()
    {
        $compaigns = Compaign::all();
        $users = User::whereHas("roles", function($query){
            $query->where("name", "customer");
        })->get();
        return view('admin.compaigns.index', compact('compaigns', 'users'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'user' => 'required',
            'name' => 'required|string|max:255'
        ]);

        try {
            Compaign::create([
                'user_id' => $request->user,
                'name' => $request->name,
            ]);
            return redirect()->back()->with('success', 'Compaign saved successfully!');
        } catch (Exception $e) {
            return redirect()->back()->with('error', $e->getMessage());
        }
    }

    public function toggleStatus($id)
    {
        $compaign = Compaign::findOrFail($id);
        $compaign->status = $compaign->status === 'active' ? 'inactive' : 'active';
        $compaign->save();

        return redirect()->back()->with('success', 'Status updated successfully.');
    }


    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|string|max:255'
        ]);

        try {
            $compaign = Compaign::findOrFail($id);
            $compaign->name = $request->name;
            $compaign->user_id = $request->user;
            $compaign->save();

            return redirect()->back()->with('success', 'Compaign updated successfully!');
        } catch (Exception $e) {
            return redirect()->back()->with('error', $e->getMessage());
        }
    }

    public function destroy($id)
    {
        Compaign::findOrFail($id)->delete();
        return redirect()->back()->with('success', 'Compaign deleted successfully!');
    }
}
