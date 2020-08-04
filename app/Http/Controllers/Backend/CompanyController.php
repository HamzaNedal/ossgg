<?php

namespace App\Http\Controllers\Backend;

use App\Models\Company;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use app\Http\Requests\CreateCompanyRequest;
use app\Http\Requests\UpdateCompanyRequest;
use App\Services\ImageService;

class CompanyController extends Controller
{
    public function index()
    {
        $companies = Company::get();
        return view('backend.companies.index', compact('companies'));
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
        if (request()->hasfile('logo')) {
            $input['logo'] = $imageService->upload($request->logo,'company');
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
        if (request()->hasfile('logo')) {
            $input['logo'] = $imageService->upload($request->logo,'company');
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
