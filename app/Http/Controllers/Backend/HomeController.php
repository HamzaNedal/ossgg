<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Company;
use App\Models\ContactUs;
use App\Models\Partnaers;
use App\Models\Post;
use App\Models\Sector;
use App\Models\Service;
use App\Models\ServiceRequests;
use App\Models\Slider;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        
        $companies = count(Company::get()->toArray());
        $events = count(Post::get()->toArray());
        $categories = count(Category::get()->toArray());
        $sliders = count(Slider::get()->toArray());
        $sectors = count(Sector::get()->toArray());
        $services = count(Service::get()->toArray());
        $serviceRequest = count(ServiceRequests::get()->toArray());
        $contactus = count(ContactUs::get()->toArray());
        $partnaers = count(Partnaers::get()->toArray());
        return view('backend.home',compact('companies','events','partnaers','categories','sliders','sectors','services','serviceRequest','contactus'));
    }

    
}
