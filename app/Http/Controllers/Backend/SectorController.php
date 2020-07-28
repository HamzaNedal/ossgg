<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Sector;
use Illuminate\Http\Request;

class SectorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $sectors = Sector::get();
        return view('backend.sectors.index', compact('sectors'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.sectors.create');
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
        ]);
        
        Sector::Create($input);

        return redirect('admin/sectors')->with('success', 'The Sector has been added successfully');
    }

    /**
     * Display the specified resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function show( $id)
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
        $sector = Sector::find($id);
        if (!$sector) {
            return redirect()->back()->with('error', 'Sector not found');
        }
        return view('backend.sectors.edit', compact('sector'));
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
        ]);

        $sector = Sector::find(request()->id);
        if (!$sector) {
            return redirect()->back()->with('error', 'Sector not found');
        }
        Sector::where('id',request()->id)->update(['name'=>request()->name]);

        return redirect('admin/sectors')->with('success', 'The Sector has been updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $sector = Sector::find($id);
        if (!$sector) {
            return redirect()->back()->with('error', 'Sector not found');
        }

        Sector::destroy($id);
        return redirect()->back()->with('success', 'The Sector has been deleted successfully');
    }

}
