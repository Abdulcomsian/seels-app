<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\Lead;
use App\Models\User;
use App\Exports\LeadsExport;
use App\Imports\LeadsImport;
use Illuminate\Http\Request;
use App\Mail\UserRegisteredMail;
use App\Models\Compaign;
use App\Models\EmailFormat;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Maatwebsite\Excel\Facades\Excel;

class UserController extends Controller
{
    public function index(Request $request)
    {
        $usersQuery = User::whereHas('roles', function ($query) {
            $query->where('name', 'customer');
        });

        if ($request->has('search') && !empty($request->search)) {
            $search = $request->search;

            $users = $usersQuery->where(function ($q) use ($search) {
                $q->where('first_name', 'like', "%{$search}%")
                    ->orWhere('last_name', 'like', "%{$search}%")
                    ->orWhere('email', 'like', "%{$search}%")
                    ->orWhere('company_name', 'like', "%{$search}%")
                    ->orWhere('phone', 'like', "%{$search}%");
            })->latest()->get();
        } else {
            $users = $usersQuery->latest()->paginate(10);
        }

        if ($request->ajax()) {
            return view('partials.users_table', compact('users'))->render();
        }

        return view('admin.users.index', compact('users'));
    }

    public function create()
    {
        return view('admin.users.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'first_name' => 'required|string|max:255',
            'last_name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email',
            'company_name' => 'nullable|string|max:255',
            'phone' => 'nullable|string',
            'key' => 'nullable|string',
            'password' => 'required|min:8|confirmed',
        ]);

        $user = User::create([
            'first_name' => $request->first_name,
            'last_name' => $request->last_name,
            'email' => $request->email,
            'company_name' => $request->company_name,
            'phone' => $request->phone,
            'email_verified_at' => Carbon::now(),
            'password' => Hash::make($request->password),
        ]);

        if ($request->key) {
            $user->userKey()->create(
                ['key' => $request->key]
            );
        }

        $user->assignRole('customer');

        Mail::to($user->email)->send(new UserRegisteredMail($user));

        return redirect()->route('users.index')->with('success', 'User created successfully. A confirmation email has been sent.');
    }

    public function edit($id)
    {
        $user = User::findOrFail($id);
        return view('admin.users.edit', compact('user'));
    }

    public function show(Request $request, $id)
    {
        $user = User::findOrFail($id);

        $leadsQuery = Lead::where('user_id', $id);

        if ($request->has('search') && !empty($request->search)) {
            $search = $request->search;

            $leadsQuery->where(function ($q) use ($search) {
                $q->where('first_name', 'like', "%{$search}%")
                    ->orWhere('last_name', 'like', "%{$search}%")
                    ->orWhere('email', 'like', "%{$search}%")
                    ->orWhere('company', 'like', "%{$search}%")
                    ->orWhere('city', 'like', "%{$search}%")
                    ->orWhere('industry', 'like', "%{$search}%")
                    ->orWhere('website', 'like', "%{$search}%")
                    ->orWhere('title', 'like', "%{$search}%")
                    ->orWhere('corporate_phone', 'like', "%{$search}%")
                    ->orWhere('status', 'like', "%{$search}%");
                });
                $leads = $leadsQuery->latest()->get();
        } else {
            $leads = $leadsQuery->latest()->paginate(10);
        }


        if ($request->ajax()) {
            return view('partials.admin_leads_table', compact('leads'))->render();
        }

        $compaigns = Compaign::all();
        return view('admin.users.show', compact('user', 'leads', 'compaigns'));
    }


    public function update(Request $request, $id)
    {
        $request->validate([
            'first_name' => 'required|string|max:255',
            'last_name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email,' . $id,
            'company_name' => 'nullable|string|max:255',
            'phone' => 'nullable|string|max:20',
            'key' => 'nullable|string',
            'password' => 'nullable|string|min:6|confirmed',
        ]);

        $user = User::findOrFail($id);

        $user->first_name = $request->first_name;
        $user->last_name = $request->last_name;
        $user->email = $request->email;
        $user->company_name = $request->company_name;
        $user->phone = $request->phone;

        if ($request->filled('password')) {
            $user->password = Hash::make($request->password);
        }

        $user->save();

        if ($request->key) {
            $user->userKey()->updateOrCreate(
                ['user_id' => $user->id],
                ['key' => $request->key]
            );
        }

        return redirect()->route('users.index')->with('success', 'User updated successfully.');
    }

    public function destroy($id)
    {
        User::findOrFail($id)->delete();
        return redirect()->back()->with('success', 'User deleted successfully.');
    }


    public function importCsv(Request $request, $id)
    {
        $request->validate([
            'excel_file' => 'required|mimes:xlsx,xls,csv|max:2048',
            'compaign_id' => 'required|exists:compaigns,id',
        ]);

        try {
            Excel::import(new LeadsImport($id, $request->compaign_id), $request->file('excel_file'));

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
        return view('admin.users.email', compact('id', 'userEmail'));
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

    public function getLeadsByCompaign($id, $userId)
    {
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
