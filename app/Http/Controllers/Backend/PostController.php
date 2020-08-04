<?php

namespace App\Http\Controllers\Backend;

use App\Models\Category;
use App\Http\Controllers\Controller;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Http\Requests\CreatePostRequest;
use App\Http\Requests\UpdatePostRequest;
use App\Services\ImageService;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts = Post::get();
        $categories = Category::get();
        return view('backend.posts.index', compact('posts', 'categories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        $categories = Category::get();
        return view('backend.posts.create',compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreatePostRequest $request,ImageService $imageService)
    {

        $detail= $imageService->convertBaseImageTOUrl($request->description,'images');
        if (request()->hasfile('image')) {
            $input['image'] =  $imageService->upload($request->image,'posts');
        }
        Post::create([
            'title' => $request->title,
            'description'=>$detail,
            'category_id'=>$request->category_id,
            'image'=>$request->image,
        ]);
        return redirect()->route('admin.post.index')->with('success', 'The Post has been added successfully');

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function show(Post $post)
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
        $id = (int) $id;
        $post = Post::findOrFail($id);
        $categories = Category::get();
        return view('backend.posts.edit', compact('post','categories'));

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function update(UpdatePostRequest $request,  $id,ImageService $imageService)
    {
        $id = (int) $id;
        $input = $request->except(['_token','_method']);
        $input['description'] = $imageService->convertBaseImageTOUrl($request->description,'images');
        if (request()->hasfile('image')) {
            $input['image'] =   $imageService->upload($request->image,'posts');
        }
        Post::where('id',$id)->update($input);
        return redirect()->route('admin.post.index')->with('success', 'The Post has been updated successfully');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $id = (int) $id;
        $post = Post::findOrFail($id);
        Post::destroy($id);
        return redirect()->back()->with('success', 'The Post has been deleted successfully');
    }
}
