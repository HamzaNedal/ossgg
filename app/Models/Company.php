<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Company extends Model
{
    use SoftDeletes;
    protected $table = 'companies';

    protected $fillable = [
        'name','description','link','image','file'
    ];
    protected $casts = [
        'created_at'=>'date:Y-m-d h:m:s'
    ];
}
