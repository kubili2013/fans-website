<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Video extends Model
{
    protected $table = 'videos';
    protected $fillable = ['url','title','description','user_id','download_count','size'];

    public function user(){
        return $this->belongsTo("App\\Models\\User");
    }
}
