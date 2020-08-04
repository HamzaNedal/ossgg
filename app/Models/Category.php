<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Category extends Model
{
    use SoftDeletes;
    protected $table = 'categories';

    protected $fillable = [
        'name',
    ];
    protected $casts = [
        'created_at'=>'date:Y-m-d h:m:s'
    ];
    public function getPosts()
    {
        return $this->hasMany('App\Models\Post');
    }
}
