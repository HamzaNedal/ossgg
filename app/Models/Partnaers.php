<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Partnaers extends Model
{
    use SoftDeletes;
    protected $table = 'partnaers';

    protected $fillable = [
        'title', 'link','image',
    ];
    protected $casts = [
        'created_at'=>'date:Y-m-d h:m:s'
    ];

}
