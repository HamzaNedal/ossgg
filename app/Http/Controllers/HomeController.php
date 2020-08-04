<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Company;
use App\Models\ContactUs;
use App\Models\Members;
use App\Models\Partnaers;
use App\Models\Post;
use App\Models\Sector;
use App\Models\Service;
use App\Models\ServiceRequests;
use App\Models\Slider;
use App\Models\StaticPage;
use App\Models\User;
use Illuminate\Http\Request;
use Symfony\Component\Console\Input\Input;
use app\Http\Requests\CreateServiceDataRequest;
use app\Http\Requests\CreateContactUsRequest;
use App\Services\ImageService;
class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        // $this->middleware('auth')->only(['index']);
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $sliders = Slider::get();

        $about_us = StaticPage::where(['key'=>'about_us','status'=>1])->where('value','<>','')->get();
        $companies = Company::get();
        $partnaers = Partnaers::get();
        $service = Service::orderBy('updated_at', 'desc')->first();
        $sectors = Sector::get();
        $posts = Post::orderBy('updated_at','desc')->limit(3)->get();
        $users = Members::orderBy('updated_at','desc')->limit(8)->get('name');
        $static_page = StaticPage::get();
        $static_page = array_column($static_page->toArray(),'value','name');
        return view('frontend.welcome',compact('sliders','about_us','partnaers','companies','service','sectors','posts','users','static_page'));
    }

    public function storeServiceResquests(CreateServiceDataRequest $request,ImageService $imageService)
    {
        $input = $request->all();
        if (request()->hasfile('file')) {
            $input['file'] = $imageService->upload($request->file,'files');
        }
        ServiceRequests::Create($input);
        return back();
    }
    public function storeContactUs(CreateContactUsRequest $request)
    {
        ContactUs::Create($request->all());
        return back();
    }

    public function getNews()
    {
       $posts =  Post::paginate(9);
       $static_page = StaticPage::get();
       $static_page = array_column($static_page->toArray(),'value','name');
       $users = Members::orderBy('updated_at','desc')->limit(8)->get('name');

        return view('frontend.news.news',compact('posts','static_page','users'));
    }


    public function ditailsNews($id)
    {
        $id = (int) $id;
        $post = Post::findOrFail($id);
        $static_page = StaticPage::get();
        $static_page = array_column($static_page->toArray(),'value','name');
        $users = Members::orderBy('updated_at','desc')->limit(8)->get('name');
        $posts = Post::with('category')->where(['category_id'=>$post->category_id])->where('id','<>',$post->id)->orderBy('created_at','desc')->limit(2)->get();
        return view('frontend.news.details',compact('post','static_page','posts','users'));
    }
   
}
