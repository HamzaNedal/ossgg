<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Members;
use Illuminate\Http\Request;
use App\Http\Requests\CreateMemberRequest;
use App\Http\Requests\UpdateMemberRequest;
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
    public function store(CreateMemberRequest $request)
    {
        Members::create($request->all());
        return redirect()->route('admin.member.index')->with('success', 'The Member has been added successfully');
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
        $member = Members::findOrFail($id);
        return view('backend.members.edit', compact('member'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateMemberRequest $request,  $id)
    {
        $id = (int) $id;
        $member = Members::findOrFail($id);
        Members::where('id',$id)->update($request->except(['_token','_method']));
        return redirect()->route('admin.member.index')->with('success', 'The Member has been updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $id = (int) $id;
        $member = Members::findOrFail($id);
        Members::destroy($id);
        return redirect()->back()->with('success', 'The Member has been deleted successfully');
    }
}
