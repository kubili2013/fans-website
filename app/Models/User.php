<?php

namespace App\Models;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;
 
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password','weibo_id','avatar','weibo_index'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function images(){
        return $this->hasMany('App\\Models\\Image');
    }

    public function videos(){
        return $this->hasMany('App\\Models\\Video');
    }

    public function goods(){
        return $this->hasMany('App\\Models\\Goods');
    }

    public function navigations(){
        return $this->hasMany('App\\Models\\Navigation');
    }

    public function news(){
        return $this->hasMany('App\\Models\\News');
    }

    public function isAdmin(){
        return $this -> role == 'admin';
    }
}
