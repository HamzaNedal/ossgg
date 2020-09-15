<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Http\Requests\CreateUserRequest;
use App\Http\Requests\UpdateUserRequest;
use App\Services\ImageService;
use Yajra\Datatables\Datatables;
class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('backend.users.index');
    }

    protected function datatable(){
       $users = User::get();
       $route = 'users';
       $path = 'profile';
       return Datatables::of($users)->addColumn('action', function ($data) use($route) {
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
        return view('backend.users.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  App\Requests\CreateUserRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreateUserRequest $request,ImageService $imageService)
    {
        $input = $request->all();
        if (request()->hasfile('image')) {
            $input['image'] = $imageService->upload($input['image'],'profile');
        }
        User::create($input);
        return redirect()->route('admin.users.index')->with('success','The user has been added successfully');

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
        $id = (int) $id;
        $user = User::findOrFail($id);
        return view('backend.users.edit',compact('user'));

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  app\Http\rRequests\UpdateUserRequest  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateUserRequest $request, $id,ImageService $imageService)
    {
        $input = $request->except(['_token','_method']);
         User::findOrFail($id);
        if (request()->hasfile('image')) {
            $input['image'] = $imageService->upload($input['image'],'profile');
        }
        User::where('id',$id)->update($input);
        return redirect()->back()->with('success','The user has been updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        User::findOrFail($id);
        User::destroy($id);
        return redirect()->back()->with('success','The user has been deleted successfully');
    }
}
