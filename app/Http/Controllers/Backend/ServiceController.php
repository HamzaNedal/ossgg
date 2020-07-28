<?php

namespace App\Http\Controllers\Backend;

use App\Models\Service;
use App\Http\Controllers\Controller;
use App\Models\ServiceRequests;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ServiceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $services = Service::get();
        return view('backend.services.index', compact('services'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.services.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $input = $request->all();
        request()->validate([
            'title' => 'required|string',
            'description' => 'required|string',
        ]);
        
        Service::Create($input);

        return redirect('admin/services')->with('success', 'The Service has been added successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Service  $Service
     * @return \Illuminate\Http\Response
     */
    public function show(Service $Service)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Service  $Service
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $service = Service::find($id);
        if (!$service) {
            return redirect()->back()->with('error', 'Service not found');
        }
        return view('backend.services.edit', compact('service'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Service  $Service
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,  $id)
    {
        $id = (int) $id;
        $input =$request->all();
        request()->validate([
            'title' => 'string',
            'description' => 'string',
        ]);
        unset($input['_token']);
        unset($input['_method']);
        array_filter($input);
        $service = Service::find(request()->id);
        if (!$service) {
            return redirect()->back()->with('error', 'Service not found');
        }
        Service::where('id',$id)->update($input);

        return redirect('admin/services')->with('success', 'The Service has been updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Service  $Service
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $service = Service::find($id);
        if (!$service) {
            return redirect()->back()->with('error', 'Service not found');
        }

        Service::destroy($id);
        return redirect()->back()->with('success', 'The Service has been deleted successfully');
    }


    public function serviceResquests()
    {
       $serviceResquests =  ServiceRequests::get();

       return view('backend.services.service_requests.index', compact('serviceResquests'));
    }

    public function destroyserviceResquests($id)
    {
        $serviceRequests = ServiceRequests::find($id);
        if (!$serviceRequests) {
            return redirect()->back()->with('error', 'Service not found');
        }

        ServiceRequests::destroy($id);
        return redirect()->back()->with('success', 'The Service Resquest has been deleted successfully');

    }


}
