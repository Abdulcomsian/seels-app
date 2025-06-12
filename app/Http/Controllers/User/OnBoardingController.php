<?php

namespace App\Http\Controllers\User;

use Illuminate\Http\Request;
use App\Models\AccountDetail;
use App\Http\Controllers\Controller;
use App\Models\EmailType;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class OnBoardingController extends Controller
{
    public function index()
    {
        $accountDetail = AccountDetail::where('user_id', Auth::id())->first();
        $accountDetails = EmailType::where('user_id', Auth::user()->id)->get(); 
        return view('user.onboarding.index', compact('accountDetail', 'accountDetails'));
    }

  public function store(Request $request)
{
    $validator = Validator::make($request->all(), [
        'email_types' => 'required|array',
        'email_types.*' => 'required|string|max:50',
        'email_email' => 'required|array',
        'email_email.*' => 'required|email',
        'email_password' => 'required|array',
        'email_password.*' => 'required|min:6',
    ], [
        'email_types.required' => 'Email type is required',
        'email_email.required' => 'Email is required',
        'email_email.*.email' => 'Invalid email format',
        'email_password.required' => 'Password is required',
        'email_password.*.min' => 'Password must be at least 6 characters',
    ]);

    if ($validator->fails()) {
        return redirect()->back()->withErrors($validator)->withInput();
    }

    $userId = Auth::id();

    $emailTypes = $request->input('email_types');
    $emails = $request->input('email_email');
    $passwords = $request->input('email_password');

    for ($i = 0; $i < count($emails); $i++) {
        // Save or update AccountDetail record for each email/password
        $accountDetail = EmailType::updateOrCreate(
            [
                'user_id' => $userId,
                'email_email' => $emails[$i]
            ],
            [
                'email_password' => $passwords[$i],
                  'type' => $emailTypes[$i]
            ]
        );
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
