<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Profile extends Model
{
    use SoftDeletes;
    protected $table = 'profile';

    protected $fillable = [
        'file'
    ];

    protected $casts = [
        'created_at'=>'date:Y-m-d h:m:s'
    ];
}
