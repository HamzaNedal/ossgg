<?php

namespace App\Http\Controllers\Backend;

use App\Models\Service;
use App\Http\Controllers\Controller;
use App\Models\ServiceRequests;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Requests\CreateServiceRequest;
use App\Http\Requests\UpdateServiceRequest;
use Yajra\DataTables\Facades\DataTables;

class ServiceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('backend.services.index');
    }
    protected function datatable(){
        $sectors = Service::get();
        $route = 'service';
         return DataTables::of($sectors)->addColumn('actions', function ($data) use($route) {
             return view('backend.datatables.actions',compact('data','route'));
         })->rawColumns(['actions'])
         ->make(true);
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
    public function store(CreateServiceRequest $request)
    {
        $input = $request->all();        
        Service::Create($input);
        return redirect()->route('admin.service.index')->with('success', 'The Service has been added successfully');
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
        $service = Service::findOrFail($id);
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
        $service = Service::findOrFail($id);
        Service::where('id',$id)->update($input);
        return redirect()->route('admin.service.index')->with('success', 'The Service has been updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Service  $Service
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $id = (int) $id;
        $service = Service::findOrFail($id);
        Service::destroy($id);
        return redirect()->back()->with('success', 'The Service has been deleted successfully');
    }


    public function serviceResquests()
    {
    //    $serviceResquests =  ServiceRequests::get();
       return view('backend.services.service_requests.index');
    }
    protected function datatableServiceResquests(){
        $serviceResquests = ServiceRequests::get();
        $route = 'service_requests';
         return DataTables::of($serviceResquests)->addColumn('actions', function ($data) use($route) {
             return view('backend.datatables.actions',compact('data','route'));
         })->addColumn('title', function ($data){
            return $data->getService->title;
         })->addColumn('sectorName', function ($data){
            return $data->getService->name;
         })->rawColumns(['title','sectorName','actions'])
         ->make(true);
     }
    public function destroyserviceResquests($id)
    {
        $id = (int) $id;
        $serviceRequests = ServiceRequests::findOrFail($id);
        ServiceRequests::destroy($id);
        return redirect()->back()->with('success', 'The Service Resquest has been deleted successfully');

    }


}
