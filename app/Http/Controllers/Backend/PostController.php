<?php

namespace App\Http\Controllers\Backend;

use App\Models\Category;
use App\Http\Controllers\Controller;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

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
    public function store(Request $request)
    {
        request()->validate([
            'title'=>'required|string',
            'category_id'=>'required|integer',
            'image'=>'required|image',
            'description'=>'required|string',
        ]);
        $input = request()->all();
        $detail = $request->description;
        // libxml_use_internal_errors(true);
        $dom = new \domdocument();
        $dom->loadHtml($detail, LIBXML_HTML_NOIMPLIED | LIBXML_HTML_NODEFDTD);
        $images = $dom->getElementsByTagName('img');
        
        foreach ($images as $count => $image) {
            $src = $image->getAttribute('src');
            
            if (preg_match('/data:image/', $src)) {
                preg_match('/data:image\/(?<mime>.*?)\;/', $src, $groups);
                $mimeType = $groups['mime'];
                $path = 'images/' . uniqid('', true) . '.' . $mimeType;
                Storage::disk('public')->put($path, file_get_contents($src));
                $image->removeAttribute('src');
                $image->setAttribute('src', asset('storage/'.$path));
            }
        }

        if (request()->hasfile('image')) {
            $name = request('image')->getClientOriginalName();
            $name = time() .uniqid(). '_' . $name;
            request('image')->move(public_path() . '/posts/', $name);
            $input['image'] = $name;
        }
        $detail = $dom->savehtml();
        Post::create([
            'title' => $input['title'],
            'description'=>$detail,
            'category_id'=>$input['category_id'],
            'image'=>$input['image'],
        ]);
        return redirect('admin/posts')->with('success', 'The Post has been added successfully');

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
        $post = Post::find($id);
        $categories = Category::get();
        if (!$post) {
            return redirect()->back()->with('error', 'Post not found');
        }

        return view('backend.posts.edit', compact('post','categories'));

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,  $id)
    {
        $input = $request->all();
        $id = (int) $id;
        $request = request();
        // $detail = $request->description;
        libxml_use_internal_errors(true);
        $dom = new \domdocument();
        $dom->loadHtml( $input['description'] , LIBXML_HTML_NOIMPLIED | LIBXML_HTML_NODEFDTD);
        $images = $dom->getElementsByTagName('img');
        if (request()->hasfile('image')) {
            $name = request('image')->getClientOriginalName();
            $name = time() .uniqid(). '_' . $name;
            request('image')->move(public_path() . '/posts/', $name);
            $input['image'] = $name;
        }
        foreach ($images as $count => $image) {
            $src = $image->getAttribute('src');
            
            if (preg_match('/data:image/', $src)) {
                preg_match('/data:image\/(?<mime>.*?)\;/', $src, $groups);
                $mimeType = $groups['mime'];
                $path = 'images/' . uniqid('', true) . '.' . $mimeType;
                Storage::disk('public')->put($path, file_get_contents($src));
                $image->removeAttribute('src');
                $image->setAttribute('src', asset('storage/'.$path));
            }
        }
        
        $input['description'] = $dom->savehtml();
        unset($input['_token']);
        unset($input['_method']);
        array_filter($input);
        Post::where('id',$id)->update($input);

        return redirect('admin/posts')->with('success', 'The Post has been updated successfully');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $id = (int) $id;
        $post = Post::find($id);
        if (!$post) {
            return redirect()->back()->with('error', 'Post not found');
        }

        Post::destroy($id);
        return redirect()->back()->with('success', 'The Post has been deleted successfully');
    }
}
