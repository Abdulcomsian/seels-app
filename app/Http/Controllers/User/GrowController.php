<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Mail\SendGrowMailToAdmin;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

// use App\Services\{{ServiceName}};
// use App\Http\Requests\{{RequestValidation}};

class GrowController extends Controller
{
    private $_service = null;
    private $_directory = 'auth/pages/{{pagename}}';
    private $_route = '{{pagename}}';

    /**
     * Create a new controller instance.
     *
     * @return $reauest, $modal
     */
    public function __construct()
    {
        // $this->_service = new {{ServiceName}}();
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // $data['all'] = $this->_service->index();
        // return view($this->_directory . '.all', compact('data'));
        return view('user.grow.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    // public function create()
    // {
    //     return view($this->_directory . '.create');
    // }

    // /**
    //  * Store a newly created resource in storage.
    //  *
    //  * @param  \Illuminate\Http\Request  $request
    //  * @return \Illuminate\Http\Response
    //  */
    // public function store({{RequestValidation}} $request)
    // {
    //     try {
    //         $this->_service->store($request->validated());
    //         return redirect()->route($this->_route . '.index')->with('success', 'Something went wrong.');
    //     } catch (\Throwable $th) {
    //         //throw $th;
    //         return redirect()->route($this->_route . '.index')->with('error', 'Something went wrong.');
    //     }
    // }

    // /**
    //  * Display the specified resource.
    //  *
    //  * @return \Illuminate\Http\Response
    //  */
    // public function show($id)
    // {
    //     $data = $this->_service->show($id);
    //     return view($this->_directory . '.show', compact('data'));
    // }

    // /**
    //  * Show the form for editing the specified resource.
    //  *
    //  * @param $id
    //  * @return \Illuminate\Http\Response
    //  */
    // public function edit($id)
    // {
    //     $data = $this->_service->show($id);
    //     return view($this->_directory . '.edit', compact('data'));
    // }

    // /**
    //  * Update the specified resource in storage.
    //  *
    //  * @param Request Validation $validation
    //  * @return \Illuminate\Http\Response
    //  */
    // public function update({{RequestValidation}} $request, $id)
    // {
    //     try {
    //         $this->_service->update($id, $request->validated());
    //         return redirect()->route($this->_route . '.index')->with('success', 'Something went wrong.');
    //     } catch (\Throwable $th) {
    //         //throw $th;
    //         return redirect()->route($this->_route . '.index')->with('error', 'Something went wrong.');
    //     }
    // }

    // /**
    //  * Remove the specified resource from storage.
    //  *
    //  * @param  $id
    //  * @return \Illuminate\Http\Response
    //  */
    // public function destroy($id)
    // {
    //     $this->_service->destroy($id);
    //     return redirect()->route($this->_route . '.index');
    // }

    public function sendMailToAdmin(Request $request)
    {
        try {

            $data = $request->all();

            $arr = [
                'sender_mail' => auth()->user()->email,
                'scale_up' => $data['scale_up'],
                'salesperson_name' => $data['salesperson_name'],
                'salesperson_email' => $data['salesperson_email'],
                'is_linked_in_check' =>  $data['linked_in'] == 'true' ? true : false,
                'is_online_training_check' => $data['online_training'] == 'true' ? true : false,
                'is_crm_optimization_check' => $data['crm_optimization'] == 'true' ? true : false,
                'is_cold_calling_check' => $data['cold_calling'] == 'true' ? true : false,
            ];

            $result = User::whereHas('roles', function ($query) {
                $query->where('name', 'admin');
            })->first();

            $adminData = [
                'name' => $result?->first_name . ' ' . $result?->last_name,
                'email' => $result?->email
            ];

            // Send mail to admin
            Mail::to($adminData['email'])->send(new SendGrowMailToAdmin($arr, $adminData));

            return response()->json(['status' => true, 'message' => 'Mail send successfully!']);

        } catch (\Exception $e) {
            return response()->json(['status' => false, 'message' => 'Something went wrong']);
        }

    }

}
