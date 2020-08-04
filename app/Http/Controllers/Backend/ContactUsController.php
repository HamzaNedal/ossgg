<?php

namespace App\Http\Controllers\Backend;

use App\Models\ContactUs;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;

class ContactUsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('backend.contactUs.index');
    }

    protected function datatable(){
         $contacts = ContactUs::get();
         return DataTables::of($contacts)->make(true);
     }
}
