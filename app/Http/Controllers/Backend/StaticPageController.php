<?php

namespace App\Http\Controllers\Backend;

use App\Models\StaticPage;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Services\ImageService;

class StaticPageController extends Controller
{


    protected  $keys = [
        'address' => 'Address',
        'mobile' => 'Mobile',
        'phone' => 'Phone',
        'facebook' => 'Facebook',
        'instagram' => 'Instagram',
        'youtube' => 'Youtube',
        'twitter' => 'Twitter',
        'about_us' => ['Who are OSSGG?','our vision', 'our mission', 'our values', 'our policies'],

        // 'system' => 'System',
    ];
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $keys = $this->keys;
        $page_static = StaticPage::get();
        unset($keys['about_us']);

        return view('backend.static_page.create', compact('keys', 'page_static'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $keys = $this->keys;
        $page_static = StaticPage::get();
        return view('backend.static_page.create', compact('keys', 'page_static'));
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
        foreach ($input as $key => $value) {
            $keyExist =  StaticPage::where(['key' => $key])->first();
            if ($keyExist) {
                StaticPage::where(['key' => $key])->update(['key' => $key, 'name' => $key, 'value' => $value]);
            } else {
                StaticPage::create(['key' => $key, 'name' => $key, 'value' => $value]);
            }
        }
        return redirect()->route('admin.static_page.index')->with('success', 'updated successfully');
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $id = (int) $id;
        $static = StaticPage::findOrFail($id);
        return view('backend.static_page.edit', compact('keys'));
    }


    public function showAboutUs()
    {
        $about_us = StaticPage::where('key', 'about_us')->get();
        return view('backend.about_us.create', compact('about_us'));
    }

    public function updateAboutUs(Request $request,ImageService $imageService)
    {
        $input = $request->all();
        unset($input['_token']);
        //create new inputs contains name and value for about us key 
        if(isset($input['newInfo'])){
            $newData = $input['newInfo'];
            foreach ($newData as $key => $data) {
                if (isset($data['file'])) {
                    $data['file'] = $imageService->upload($data['file'],'iconsAboutUs');
                }
                StaticPage::create(['key' => 'about_us', 'name' => $data['name'],'value' => $data['value'],'status'=> $data['status']??0,'icon'=>$data['file']??'']);
            }
            unset($input['newInfo']);
        }
        //create and update data by key and name
        foreach ($input as $name => $value) {
            if (isset($value['file'])) {
                $data['file'] = $imageService->upload($value['file'],'iconsAboutUs');
            }
           $name = str_replace('_',' ',$name);
            $keyExist =  StaticPage::where(['key' => 'about_us','name'=>$name])->first();
            if($name == 'Who are OSSGG?'):
                 $value['status'] = 1 ;
            endif;
            $keyExist == true ? 
            StaticPage::where(['key' => 'about_us','name' => $name])->update(['value' => $value['value'],'status'=> $value['status']??0,'icon'=>$value['file']??null])
            : StaticPage::create(['key' => 'about_us', 'name' => $name,'value' => $value['value'],'status'=> $value['status']??0,'icon'=>$value['file']??'']);
        }

        
        return redirect()->route('admin.about_us.show')->with('success', 'updated successfully');
    }
}
