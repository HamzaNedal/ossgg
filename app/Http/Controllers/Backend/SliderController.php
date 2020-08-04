<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Slider;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Http\Requests\CreateSliderRequest;
use App\Http\Requests\UpdateSliderRequest;
use App\Services\ImageService;
use Yajra\DataTables\Facades\DataTables;

class SliderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('backend.sliders.index');
    }
    protected function datatable(){
        $sliders = Slider::get();
        $route = 'slider';
        return DataTables::of($sliders)->addColumn('action', function ($data) use($route) {
            return view('backend.datatables.actions',compact('data','route'));
        })->addColumn('image', function ($data) {
           return view('backend.datatables.sliderImages',compact('data'));
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
        return view('backend.sliders.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreateSliderRequest $request,ImageService $imageService)
    {
       $input =  $request->all();
        if (request()->hasfile('background_image')) {
            $input['background_image'] = $imageService->upload($request->background_image,'background_image');
        }
        if (request()->hasfile('image')) {
            $input['image'] = $imageService->upload($request->image,'image');
        }
        Slider::Create($input);
        return redirect()->route('admin.slider.index')->with('success','The Slider has been added successfully');

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
        $id =(int) $id;
        $slider = Slider::findOrFail($id);
        return view('backend.sliders.edit',compact('slider'));

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateSliderRequest $request, $id,ImageService $imageService)
    {
        $id = (int) $id;
        $slider = Slider::findOrFail($id);
        $input =  $request->except(['_token','_method']);      
        if (request()->hasfile('background_image')) {
            $input['background_image'] = $imageService->upload($request->background_image,'background_image');
          }
        if (request()->hasfile('image')) {
            $input['image'] = $imageService->upload($request->image,'image');
        }
        Slider::where('id',$id)->update($input);
        return redirect()->route('admin.slider.index')->with('success','The Slider has been updated successfully');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $slider = Slider::findOrFail($id);
        Slider::destroy($id);
        return redirect()->back()->with('success','The Slider has been deleted successfully');
    }
}
