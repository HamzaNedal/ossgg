<?php

namespace App\Http\Controllers\Backend;

use App\Models\Company;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

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

        // $companies = Company::get();
        return view('backend.companies.create');
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
            'name' => 'required|string',
            'description' => 'required|string',
            'link' => 'required|url',
            'logo' => 'required|image',
        ]);

        if (request()->hasfile('logo')) {
            $name = request('logo')->getClientOriginalName();
            $name = time() . uniqid() . '_' . $name;
            request('logo')->move(public_path() . '/company/', $name);
            $input['logo'] = $name;
        }
        Company::Create($input);
        return redirect('admin/companies')->with('success', 'The Company has been added successfully');
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
        $company = Company::find($id);
        if (!$company) {
            return redirect()->back()->with('error', 'Company not found');
        }

        return view('backend.companies.edit', compact('company'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,  $id)
    {
        $id = (int) $id;
        request()->validate([
            'name' => 'required|string',
            'description' => 'required|string',
            'link' => 'required|string',
            'logo' => 'nullable',
        ]);
        $company = Company::find($id);
        if (!$company) {
            return redirect()->back()->with('error', 'Company not found');
        }

        $input = request()->all();
        unset($input['_token']);
        unset($input['_method']);
        array_filter($input);
        
        if (request()->hasfile('logo')) {
            $name = request('logo')->getClientOriginalName();
            $name = time() . uniqid() . '_' . $name;
            request('logo')->move(public_path() . '/company/', $name);
            $input['logo'] = $name;
        }
        // array_filter($request->all());
        Company::where('id', $id)->update($input);

        return redirect('admin/companies')->with('success', 'The Company has been updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $id = (int) $id;
        $company = Company::find($id);
        if (!$company) {
            return redirect()->back()->with('error', 'Company not found');
        }

        Company::destroy($id);
        return redirect()->back()->with('success', 'The Company has been deleted successfully');
    }
}
