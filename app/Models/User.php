<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\Hash;

class User extends Authenticatable
{
    use Notifiable;use SoftDeletes;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password','image','gender','dob'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
        'created_at'=>'date:Y-m-d h:m:s'
    ];

    public function getGenderAttribute($val)
    {
        if($val == 0){
            return $val = 'None';
        }elseif($val == 1){
            return $val = 'Male';
        }else{
            return $val = 'Female';
        }
    }

    public function setPasswordAttribute($value)
    {
        $this->attributes['password'] =  Hash::make($value);
    }
}
