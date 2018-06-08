<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Navigation extends Model
{
    protected $table = 'navigations';
    protected $fillable = ['user_id','url','image_url','title','self','description'];

    public function user(){
        return $this->belongsTo("App\\Models\\User");
    }

}
