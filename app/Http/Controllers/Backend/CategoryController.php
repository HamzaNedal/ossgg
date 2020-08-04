<?php

namespace App\Http\Controllers\Backend;

use App\Models\Category;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\CreateCategoryRequest;
use App\Http\Requests\UpdateCategoryRequest;
class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categories = Category::get();
        return view('backend.categories.index', compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.categories.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreateCategoryRequest $request)
    {
        Category::Create($request->all());
        return redirect()->route('admin.category.index')->with('success', 'The category has been added successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Category  $Category
     * @return \Illuminate\Http\Response
     */
    public function show(Category $Category)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Category  $Category
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $category = Category::findOrFail($id);
        return view('backend.categories.edit', compact('category'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Category  $Category
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateCategoryRequest $request,  $id)
    {
        $id = (int) $id;
        $category = Category::findOrFail($request->id);
        Category::where('id',$id)->update(['name'=>$request->name]);
        return redirect()->route('admin.category.index')->with('success', 'The Category has been updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Category  $Category
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $id =(int) $id;
        $category = Category::findOrFail($id);
        Category::destroy($id);
        return redirect()->back()->with('success', 'The Category has been deleted successfully');
    }
}
