<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Slider;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class SliderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $sliders = Slider::get();
        return view('backend.sliders.index',compact('sliders'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.sliders.create');
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
            'image' => 'image|nullable',
            'background_image' => 'required|image',
        ]);

        if (request()->hasfile('background_image')) {
            $name = request('background_image')->getClientOriginalName();
            $name = time() .uniqid(). '_' . $name;
            request('background_image')->move(public_path() . '/background_image/', $name);
            $input['background_image'] = $name;
        }
        if (request()->hasfile('image')) {
            $name = request('image')->getClientOriginalName();
            $name = time() .uniqid(). '_' . $name;
            request('image')->move(public_path() . '/image/', $name);
            $input['image'] = $name;
        }
        
        Slider::Create($input);
        
        return redirect('admin/sliders')->with('success','The Slider has been added successfully');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
       
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $slider = Slider::find($id);
        if(!$slider){
            return redirect()->back()->with('error','Slider not found');

        }
        return view('backend.sliders.edit',compact('slider'));

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
        $slider = Slider::find($id);
        // dd($request->all());
        if (!$slider) {
            return redirect()->back()->with('error', 'Slider not found');
        }
        $input = $request->all();
        request()->validate([
            'title' => 'string',
            'description' => 'string',
            'image' => 'image|nullable',
            'background_image' => 'image',
        ]);
        unset($input['_token']);
        unset($input['_method']);
        array_filter($input);
        
        if (request()->hasfile('background_image')) {
            $name = request('background_image')->getClientOriginalName();
            $name = time() .uniqid(). '_' . $name;
            request('background_image')->move(public_path() . '/background_image/', $name);
            $input['background_image'] = $name;
        }
        if (request()->hasfile('image')) {
            $name = request('image')->getClientOriginalName();
            $name = time() .uniqid(). '_' . $name;
            request('image')->move(public_path() . '/image/', $name);
            $input['image'] = $name;
        }
        
        Slider::where('id',$id)->update($input);
        
        return redirect('admin/sliders')->with('success','The Slider has been updated successfully');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $slider = Slider::find($id);
        if(!$slider){
            return redirect()->back()->with('error','Slider not found');
        }

        Slider::destroy($id);
        return redirect()->back()->with('success','The Slider has been deleted successfully');
    }
}
