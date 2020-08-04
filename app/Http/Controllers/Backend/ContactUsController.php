<?php

namespace App\Http\Controllers\Backend;

use App\Models\ContactUs;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ContactUsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $contacts = ContactUs::get();
        return view('backend.contactUs.index', compact('contacts'));
    }


}
