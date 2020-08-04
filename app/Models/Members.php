<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Members extends Model
{
    use SoftDeletes;
    protected $table = 'members';

    protected $fillable = [
        'name', 
    ];
    protected $casts = [
        'created_at'=>'date:Y-m-d h:m:s'
    ];
}
