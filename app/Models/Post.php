<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
class Post extends Model
{
    use SoftDeletes;
    protected $table = 'posts';

    protected $fillable = [
        'title', 'description', 'category_id','image',
    ];
    protected $casts = [
      'created_at'=>'date:Y-m-d h:m:s'
  ];

    public function category()
    {
      return  $this->belongsTo('App\Models\Category','category_id');
    }
}
