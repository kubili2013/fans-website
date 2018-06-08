<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Image extends Model
{
    protected $table = 'images';
    protected $fillable = ['url','description','user_id','download_count','size'];

    
    public function user(){
        return $this->belongsTo("App\\Models\\User");
    }
    
}
