<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ServiceRequests extends Model
{
    use SoftDeletes;
    protected $table = 'form_services';

    protected $fillable = [
        'name','country','phone_country_code','phone_no','email','name_of_project','sector_of_project_id','service_id'
        ,'short_description','file'
    ];


    public function getService()
    {
        return $this->belongsTo('App\Models\Service','service_id','id');
    }

    public function getSector()
    {
        return $this->belongsTo('App\Models\Sector','sector_of_project_id','id');
    }
}
