<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\Models\User;

class FansController extends Controller
{
    public function index()
    {
        return view('fans',["fans" => User::orderBy('id', 'desc')->paginate(15)]);
    }

}
