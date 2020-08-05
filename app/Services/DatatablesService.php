<?php

namespace App\Services;

use Illuminate\Database\Eloquent\Model;
use Yajra\DataTables\Facades\DataTables;

class DatatablesService {

    protected function datatable(Model $model,$route){
        $model =  $model::get();
         return DataTables::of($model)->addColumn('actions', function ($data) use($route) {
             return view('backend.datatables.actions',compact('data','route'));
         })->rawColumns(['actions'])
         ->make(true);
     }
}