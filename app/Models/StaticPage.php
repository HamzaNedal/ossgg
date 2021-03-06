<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class StaticPage extends Model
{
    use SoftDeletes;
    protected $table = 'static_page';

    protected $fillable = [
        'key','name','value','status','icon'
    ];
    protected $casts = [
        'created_at'=>'date:Y-m-d h:m:s'
    ];
}
