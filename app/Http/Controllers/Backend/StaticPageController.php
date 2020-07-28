<?php

namespace App\Http\Controllers\Backend;

use App\Models\StaticPage;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

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
        unset($input['_token']);
        foreach ($input as $key => $value) {
            // if(!array_key_exists($key,$this->keys)){
            //     return redirect('admin/static_page')->with('error', "$this->keys is required");
            // }
            $keyExist =  StaticPage::where(['key' => $key])->first();
            if ($keyExist) {
                StaticPage::where(['key' => $key])->update(['key' => $key, 'name' => $key, 'value' => $value]);
            } else {
                StaticPage::Create(['key' => $key, 'name' => $key, 'value' => $value]);
            }
        }

        return redirect('admin/static_page')->with('success', 'updated successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\StaticPage  $staticPage
     * @return \Illuminate\Http\Response
     */
    public function show(StaticPage $staticPage)
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
        $static = StaticPage::find($id);
        if (!$static) {
            return redirect()->back()->with('error', 'Data not found');
        }

        return view('backend.static_page.edit', compact('keys'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\StaticPage  $staticPage
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, StaticPage $staticPage)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\StaticPage  $staticPage
     * @return \Illuminate\Http\Response
     */
    public function destroy(StaticPage $staticPage)
    {
        //
    }


    public function showAboutUs()
    {
        $about_us = StaticPage::where('key', 'about_us')->get();
        // if (!$about_us->toArray()) {
        //     $about_us = $this->keys['about_us'];
        //     return view('backend.About_us.create', compact('about_us'));
        // }
        // $about_us_keys = $this->keys['about_us'];
        return view('backend.About_us.create', compact('about_us'));
    }

    public function updateAboutUs(Request $request)
    {
        $input = $request->all();
        unset($input['_token']);
        if(isset($input['newInfo'])){
            $newData = $input['newInfo'];
            unset($input['newInfo']);
            foreach ($newData as $key => $data) {
                if (isset($data['file'])) {
                    $iconName =$data['file']->getClientOriginalName();
                    $iconName = time() .uniqid(). '_' . $iconName;
                    $data['file']->move(public_path() . '/iconsAboutUs/', $iconName);
                    $data['file'] = $iconName;
                }
                StaticPage::Create(['key' => 'about_us', 'name' => $data['name'],'value' => $data['value'],'status'=> $data['status']??0,'icon'=>$data['file']??'']);
            }
        }
        foreach ($input as $name => $value) {
            if (isset($value['file'])) {
                $iconName =$value['file']->getClientOriginalName();
                $iconName = time() .uniqid(). '_' . $iconName;
                $value['file']->move(public_path() . '/iconsAboutUs/', $iconName);
                $value['file'] = $iconName;
            }
           $name = str_replace('_',' ',$name);
            $keyExist =  StaticPage::where(['key' => 'about_us','name'=>$name])->first();
            if ($keyExist) {
               $issetFile = $value['file'] ?? false;
               if(!$issetFile){
                StaticPage::where(['key' => 'about_us','name' => $name])->update(['value' => $value['value'],'status'=> $value['status']??0]);
               }else{
                StaticPage::where(['key' => 'about_us','name' => $name])->update(['value' => $value['value'],'status'=> $value['status']??0,'icon'=>$value['file']]);

               }
            } else {
                StaticPage::Create(['key' => 'about_us', 'name' => $name,'value' => $value['value'],'status'=> $value['status']??0,'icon'=>$value['file']??'']);
            }
        }

        
        return redirect('admin/about-us')->with('success', 'updated successfully');
    }
}
