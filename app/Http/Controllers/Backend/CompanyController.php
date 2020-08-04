<?php

namespace App\Http\Controllers\Backend;

use App\Models\Company;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\CreateCompanyRequest;
use App\Http\Requests\UpdateCompanyRequest;
use App\Services\ImageService;
use Yajra\Datatables\Datatables;

class CompanyController extends Controller
{
    public function index()
    {
        return view('backend.companies.index');
    }
    protected function datatable(){
        $companies = Company::get();
        $route = 'company';
        $path = 'company';
         return Datatables::of($companies)->addColumn('action', function ($data) use($route) {
             return view('backend.datatables.actions',compact('data','route'));
         })->addColumn('image', function ($data) use ($path){
            return view('backend.datatables.image',compact('data','path'));
        })->rawColumns(['image','action'])
         ->make(true);
     }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.companies.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreateCompanyRequest $request,ImageService $imageService)
    {
        $input = $request->all();
        if (request()->hasfile('image')) {
            $input['image'] = $imageService->upload($request->image,'company');
        }
        Company::Create($input);
        return redirect()->rotue('admin.company.index')->with('success', 'The Company has been added successfully');
    }

    /**
     * Display the specified resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $id = (int) $id;
        $company = Company::findOrFail($id);
        return view('backend.companies.edit', compact('company'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateCompanyRequest $request,  $id,ImageService $imageService)
    {
        $id = (int) $id;
        $company = Company::findOrFail($id);
        $input = $request->except(['_token','_method']);
        if (request()->hasfile('image')) {
            $input['image'] = $imageService->upload($request->image,'company');
        }
        Company::where('id', $id)->update($input);
        return redirect()->rotue('admin.company.index')->with('success', 'The Company has been updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $id = (int) $id;
        $company = Company::findOrFail($id);
        Company::destroy($id);
        return redirect()->back()->with('success', 'The Company has been deleted successfully');
    }
}
