<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class News extends Model
{
    protected $table = 'news';
    protected $fillable = ['user_id','about_date','image_url','title','description'];

    public function user(){
        return $this->belongsTo("App\\Models\\User");
    }
}
