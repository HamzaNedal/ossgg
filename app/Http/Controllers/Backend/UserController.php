<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Http\Requests\CreateUserRequest;
use App\Http\Requests\UpdateUserRequest;
use App\Services\ImageService;
class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::get();
        return view('backend.users.index',compact('users'));
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
    public function update(UpdateUserRequest $request, $id)
    {
        $input = $request->except(['_token','_method']);
        $user = User::findOrFail($id);
        if (request()->hasfile('image')) {
            $input['image'] = $imageService->upload($input['image'],'profile');
        }
        User::where('id',$id)->update($input);
        return redirect()->route('admin.users.index')->with('success','The user has been updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $user = User::findOrFail($id);
        User::destroy($id);
        return redirect()->back()->with('success','The user has been deleted successfully');
    }
}
