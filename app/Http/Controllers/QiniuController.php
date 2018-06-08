<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class QiniuController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    //
    public function token()
    {
        $disk = \Storage::disk('qiniu');
        return ["token" => $disk->getDriver()->uploadToken(request('key')),"filename"=>request('key')];
    }

}
