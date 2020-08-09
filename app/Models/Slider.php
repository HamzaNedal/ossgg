<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Slider extends Model
{
    use SoftDeletes;
    protected $table = 'sliders';

    protected $fillable = [
        'title','description','image','background_image','link'
    ];
    protected $casts = [
        'created_at'=>'date:Y-m-d h:m:s'
    ];
}
