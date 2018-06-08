<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Goods extends Model
{
    //
    protected $table = 'goods';
    protected $fillable = ['user_id','url','image_url','title','description'];

    public function user(){
        return $this->belongsTo("App\\Models\\User");
    }
}
