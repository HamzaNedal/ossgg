<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Members;
use Illuminate\Http\Request;

class MembersContrllers extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $members = Members::get();
        return view('backend.members.index', compact('members'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.members.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // $input = $request->all();
      $input=  request()->validate([
            'name' => 'required|string',
        ]);
        
        Members::Create($input);

        return redirect('admin/members')->with('success', 'The Member has been added successfully');
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
        $member = Members::find($id);
        if (!$member) {
            return redirect()->back()->with('error', 'Member not found');
        }
        return view('backend.members.edit', compact('member'));
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

        $member = Members::find(request()->id);
        if (!$member) {
            return redirect()->back()->with('error', 'member not found');
        }
        Members::where('id',$id)->update(['name'=>request()->name]);

        return redirect('admin/members')->with('success', 'The Member has been updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $member = Members::find($id);
        if (!$member) {
            return redirect()->back()->with('error', 'Member not found');
        }

        Members::destroy($id);
        return redirect()->back()->with('success', 'The Member has been deleted successfully');
    }
}
