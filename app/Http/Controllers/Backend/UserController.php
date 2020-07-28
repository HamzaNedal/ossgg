<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

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
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
       $input = $request->all();
        request()->validate([
            'name' => 'required|string',
            'email' => 'required|email|unique:users',
            'image' => 'image|nullable',
            'gender' => 'required|integer',
            'password' => 'required|string',
        ]);

        if (request()->hasfile('image')) {
            $name = request('image')->getClientOriginalName();
            $name = time() .uniqid(). '_' . $name;
            request('image')->move(public_path() . '/profile/', $name);
            $input['image'] = $name;
        }
        $input['password'] =  Hash::make($request->password);
        // dd($input);
        User::Create($input);
        
        return redirect('admin/users')->with('success','The user has been added successfully');

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
        $user = User::find($id);
        if(!$user){
            return redirect()->back()->with('error','User not found');

        }
        return view('backend.users.edit',compact('user'));

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
        $input = $request->all();
        $user = User::find($id);
        if (!$user) {
            return redirect()->back()->with('error', 'User not found');
        }
      $input =  request()->validate([
            'name' => 'string',
            'email' => 'email|unique:users,email,'.$id,
            'image' => 'image|nullable',
            'gender' => 'integer',
        ]);

    
        if (request()->hasfile('image')) {
            $name = request('image')->getClientOriginalName();
            $name = time() .uniqid(). '_' . $name;
            request('image')->move(public_path() . '/profile/', $name);
            $input['image'] = $name;
        }
        
        User::where('id',$id)->update($input);
        
        return redirect('admin/users')->with('success','The user has been updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $user = User::find($id);
        // dd($user);
        if(!$user){
            return redirect()->back()->with('error','User not found');
        }

        User::destroy($id);
        return redirect()->back()->with('success','The user has been deleted successfully');
    }
}
