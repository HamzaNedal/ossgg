<?php

namespace App\Http\Controllers\Backend;
use App\Http\Controllers\Controller;
use App\Models\Partnaers;
use Illuminate\Http\Request;

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
        //  $request->all();
         $input =  request()->validate([
            'title' => 'required|string',
            'link' => 'required|url',
            'logo' => 'required|image',
        ]);

        if (request()->hasfile('logo')) {
            $name = request('logo')->getClientOriginalName();
            $name = time() . uniqid() . '_' . $name;
            request('logo')->move(public_path() . '/partnaers/', $name);
            $input['logo'] = $name;
        }
        Partnaers::Create($input);
        return redirect('admin/partnaers')->with('success', 'The Partnaer has been added successfully');
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
        $partnaer = Partnaers::find($id);
        if (!$partnaer) {
            return redirect()->back()->with('error', 'Partnaer not found');
        }

        return view('backend.partnaers.edit', compact('partnaer'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $id = (int) $id;
       $input = request()->validate([
            'title' => 'required|string',
            'link' => 'required|string',
            'logo' => 'nullable',
        ]);
        $partnaers = Partnaers::find(request()->id);
        if (!$partnaers) {
            return redirect()->back()->with('error', 'Partnaer not found');
        }

       // $input = request()->all();
       // unset($input['_token']);
       // unset($input['_method']);
        array_filter($input);
        
        if (request()->hasfile('logo')) {
            $name = request('logo')->getClientOriginalName();
            $name = time() . uniqid() . '_' . $name;
            request('logo')->move(public_path() . '/partnaers/', $name);
            $input['logo'] = $name;
        }
        Partnaers::where('id', $id)->update($input);

        return redirect('admin/partnaers')->with('success', 'The Partnaer has been updated successfully');
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
        $partnaers = Partnaers::find($id);
        if (!$partnaers) {
            return redirect()->back()->with('error', 'Partnaer not found');
        }

        Partnaers::destroy($id);
        return redirect()->back()->with('success', 'The Partnaer has been deleted successfully');
    }
}
