<?php

namespace App\Http\Controllers\User;

use Illuminate\Http\Request;
use App\Models\AccountDetail;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class OnBoardingController extends Controller
{
    public function index()
    {
        $accountDetail = AccountDetail::where('user_id', Auth::id())->first();
        return view('user.onboarding.index', compact('accountDetail'));
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(),[
            'email_email' => $request->email ? 'required|email' : 'nullable',
            'email_password' => $request->email ? 'required|min:6' : 'nullable',
            'linkedin_email' => $request->linkedin ? 'required|email' : 'nullable',
            'linkedin_password' => $request->linkedin ? 'required|min:6' : 'nullable',
        ],[
            'email_email.required' => 'Email is required',
            'email_email.email' => 'Invalid email format',
            'email_password.required' => 'Password is required',
            'linkedin_email.required' => 'LinkedIn email is required',
            'linkedin_email.email' => 'Invalid linkedIn email format',
            'linkedin_password.required' => 'LinkedIn Password is required'
        ]);

        if ($validator->fails()) {
            return redirect()->back()->with('error', $validator->messages()->first())->withInput($request->all());
        }
        if ($request->has('email_email') || $request->has('email_password')) {
        // Update or create the record
        AccountDetail::updateOrCreate(
            ['user_id' => Auth::id()], // Condition to check if the record exists
            [
                'email_email' => $request->email_email ?? null,
                'email_password' => $request->email_password ?? null,
            ]
        );
            return redirect()->back()->with('success', 'Email details saved successfully.');

        }

        if ($request->has('linkedin_email') || $request->has('linkedin_password')) {
            AccountDetail::updateOrCreate(
                ['user_id' => Auth::id()],
                [
                    'linkedin_email' => $request->linkedin_email ?? null,
                    'linkedin_password' => $request->linkedin_password ?? null,
                ]
            );
            return redirect()->back()->with('success', 'LinkedIn details saved successfully.');
        }
    }
}
