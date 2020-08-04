<?php

namespace App\Http\Controllers\Backend;
use App\Http\Controllers\Controller;
use App\Models\Partnaers;
use Illuminate\Http\Request;
use app\Http\Requests\CreatePartnaerRequest;
use app\Http\Requests\UpdatePartnaerRequest;
use App\Services\ImageService;
class PartnaersControlle extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $partnaers = Partnaers::get();
        return view('backend.partnaers.index', compact('partnaers'));    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.partnaers.create');  

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
         $input = request()->except(['_token','_method']);
        if (request()->hasfile('logo')) {
            $input['logo'] = $imageService->upload($request->logo,'partnaers');
        }
        Partnaers::Create($input);
        return redirect()->route('admin.partnaer.index')->with('success', 'The Partnaer has been added successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $id = (int) $id;
        $partnaer = Partnaers::findOrFail($id);
        return view('backend.partnaers.edit', compact('partnaer'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id,ImageService $imageService)
    {
        $id = (int) $id;
        $input = $request->except(['_token','_method']);
        $partnaers = Partnaers::findOrFailOrFail($id);        
        if (request()->hasfile('logo')) {
            $input['logo'] = $imageService->upload($request->logo,'partnaers');
        }
        Partnaers::where('id', $id)->update($input);
        return redirect()->route('admin.partnaer.index')->with('success', 'The Partnaer has been updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        
        $id = (int) $id;
        $partnaers = Partnaers::findOrFail($id);
        Partnaers::destroy($id);
        return redirect()->back()->with('success', 'The Partnaer has been deleted successfully');
    }
}
