<?php

namespace App\Http\Controllers\User;

use Illuminate\Http\Request;
use App\Models\AccountDetail;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class OnBoardingController extends Controller
{
    public function index()
    {
        return view('user.onboarding.index');
    }

    public function store(Request $request)
    {
        $request->validate([
            'email_email' => $request->email ? 'required' : 'nullable',
            'email_password' => $request->email ? 'required|min:6' : 'nullable',
            'linkedin_email' => $request->linkedin ? 'required|email' : 'nullable',
            'linkedin_password' => $request->linkedin ? 'required|min:6' : 'nullable',
        ]);

        // Update or create the record
        AccountDetail::updateOrCreate(
            ['user_id' => Auth::id()], // Condition to check if the record exists
            [
                'email_email' => $request->email_email ?? null,
                'email_password' => bcrypt($request->email_password) ?? null,
                'linkedin_email' => $request->linkedin_email ?? null,
                'linkedin_password' => bcrypt($request->linkedin_password) ?? null,
            ]
        );

        return redirect()->back()->with('success', 'Account details saved successfully.');
    }
}
