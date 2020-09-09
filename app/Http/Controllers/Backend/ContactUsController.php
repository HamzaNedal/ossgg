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
         $contacts = ContactUs::orderBy('created_at','desc')->get();
         $route = 'contactUs.status';
         $bindModel ='contact';
         return DataTables::of($contacts)->addColumn('action', function ($data) use($route,$bindModel) {
             return  $data->status == 0 ?  view('backend.datatables.read',compact('data','route','bindModel')) : 'readable';
        })->rawColumns(['action'])
         ->make(true);
     }

      public function status(ContactUs $contact)
     {
        //  dd($contact->id);
         ContactUs::where('id',$contact->id)->update([
             'status'=>"1",
         ]);

         return back();

     }
}
