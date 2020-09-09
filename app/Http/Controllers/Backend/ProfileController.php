<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Http\Requests\CreateProfileRequest;
use App\Models\Profile;
use App\Services\ImageService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Yajra\DataTables\DataTables;

class ProfileController extends Controller
{
    public function index()
    {
        return view('backend.profile.index');

    }
    protected function datatable(){
        $profile = Profile::get();
        $route = 'profile';
         return DataTables::of($profile)->addColumn('actions', function ($data) use($route) {
             return view('backend.datatables.actions',compact('data','route'));
         })->addColumn('file',function ($data)
         {
            return '<a href="'.asset("/files/".$data->file).'">Download File</a>';
         })
         ->rawColumns(['file','actions'])
         ->make(true);
     }
     public function create()
     {
 
         return view('backend.profile.create');
     }
    public function store(CreateProfileRequest $request,ImageService $imageService)
    {
        $input = $request->except(['_token','_method']);
        if (request()->hasfile('file')) {
            $input['file'] =  $imageService->upload($input['file'],'files');
        }
        Profile::create([
            'file'=> $input['file'],
        ]);
        return redirect()->route('admin.profile.index')->with('success', 'The Profile has been added successfully');

    }
    public function destroy(Profile $id)
    {
        Profile::destroy($id->id);
        return redirect()->back()->with('success', 'The Profile has been deleted successfully');
    }

    public  function download()
    {
        $profile = Profile::orderBy('created_at', 'desc')->first();
        if(!$profile){
            return back();
        }
        return redirect(asset('files/'.$profile->file));
    }
}
