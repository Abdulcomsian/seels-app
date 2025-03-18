<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\Lead;
use App\Models\User;
use App\Exports\LeadsExport;
use App\Imports\LeadsImport;
use Illuminate\Http\Request;
use App\Mail\UserRegisteredMail;
use App\Models\EmailFormat;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Maatwebsite\Excel\Facades\Excel;

class UserController extends Controller
{
    public function index()
    {
        $users = User::whereHas('roles', function ($query) {
            $query->where('name', 'customer');
        })->latest()->get();

        return view('admin.users.index', compact('users'));
    }

    public function create()
    {
        return view('admin.users.create');
    }

    public function store(Request $request)
    {
        // dd($request->all());
        // Validate incoming request
        // $request->validate([
        //     'first_name' => 'required|string|max:255',
        //     'last_name' => 'required|string|max:255',
        //     'email' => 'required|email|unique:users,email',
        //     'company_name' => 'nullable|string|max:255',
        //     'phone' => 'nullable|string',
        //     'password' => 'required|min:8|confirmed',
        // ]);


        // Create user and hash the password
        $user = User::create([
            'first_name' => $request->first_name,
            'last_name' => $request->last_name,
            'email' => $request->email,
            'company_name' => $request->company_name,
            'phone' => $request->phone,
            'email_verified_at' => Carbon::now(),
            'password' => Hash::make($request->password),
        ]);

        $user->assignRole('customer');

        Mail::to($user->email)->send(new UserRegisteredMail($user));

        // Redirect with success message
        return redirect()->route('users.index')->with('success', 'User created successfully. A confirmation email has been sent.');
    }

    public function edit($id)
    {
        $user = User::findOrFail($id);
        return view('admin.users.edit', compact('user'));
    }

    public function show($id)
    {
        $user = User::findOrFail($id);
        $leads = Lead::where('user_id', $id)->paginate(10);
        return view('admin.users.show', compact('user', 'leads'));
    }

    public function update(Request $request, $id)
    {
        // Validate the request
        // $request->validate([
        //     'first_name' => 'required|string|max:255',
        //     'last_name' => 'required|string|max:255',
        //     'email' => 'required|email|unique:users,email,' . $id,
        //     'company_name' => 'nullable|string|max:255',
        //     'phone' => 'nullable|string|max:20',
        //     'password' => 'nullable|string|min:6|confirmed', // Confirmed means it must match confirm_password
        // ]);

        // Find the user by ID
        $user = User::findOrFail($id);

        // Update user details
        $user->first_name = $request->first_name;
        $user->last_name = $request->last_name;
        $user->email = $request->email;
        $user->company_name = $request->company_name;
        $user->phone = $request->phone;

        // Update password if provided
        if ($request->filled('password')) {
            $user->password = Hash::make($request->password);
        }

        // Save the user
        $user->save();

        return redirect()->route('users.index')->with('success', 'User updated successfully.');
    }

    public function destroy($id)
    {
        User::findOrFail($id)->delete();
        return redirect()->back()->with('success', 'User deleted successfully.');
    }


    public function importCsv(Request $request, $id)
    {
        // $request->validate([
        //     'excel_file' => 'required|mimes:xlsx,xls,csv|max:2048',
        // ]);

        try {
            Excel::import(new LeadsImport($id), $request->file('excel_file'));

            return back()->with('success', 'Excel file imported successfully!');
        } catch (\Exception $e) {
            return back()->with('error', 'Error importing file: ' . $e->getMessage());
        }
    }

    public function export(Request $request)
    {
        $selectedLeads = $request->selectedLeads ?? [];
        if (empty($selectedLeads)) {
            return response()->json(['message' => 'No leads selected'], 400);
        }

        return Excel::download(new LeadsExport($selectedLeads), 'selected_leads.xlsx');
    }

    public function email($id)
    {
        $userEmail = EmailFormat::where('user_id', $id)->first();
        return view('admin.users.email', compact('id','userEmail'));
    }

    public function updateEmail(Request $request, $id)
    {
        $validatedData = $request->validate([
            'subject' => 'required|string|max:255',
            'snippet1' => 'nullable|string',
            'snippet2' => 'nullable|string',
            'snippet3' => 'nullable|string',
            'snippet4' => 'nullable|string',
        ]);

        try {
            $emailFormat = EmailFormat::updateOrCreate(
                ['user_id' => $id],
                $validatedData
            );

            return response()->json([
                'success' => true,
                'message' => 'Email content updated successfully!',
                'data' => $emailFormat
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Something went wrong!',
                'error' => $e->getMessage()
            ], 500);
        }
    }
}
