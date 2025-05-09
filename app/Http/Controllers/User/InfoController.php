<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
// use App\Services\{{ServiceName}};
// use App\Http\Requests\{{RequestValidation}};

class InfoController extends Controller
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
        return view('user.info.index');
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
}
