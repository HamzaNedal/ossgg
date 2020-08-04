<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Sector extends Model
{
    use SoftDeletes;
    protected $table = 'sector_of_project';

    protected $fillable = [
        'name',
    ];
    protected $casts = [
        'created_at'=>'date:Y-m-d h:m:s'
    ];
}
