<?php

namespace App\Http\Controllers;

use App\Models\Navigation;
use Illuminate\Http\Request;
use Auth;
use App\Http\Requests\NavigationRequest;
class NavigationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view("add.navigation");
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(NavigationRequest $request)
    {
        Auth::user()->navigations()->create($request->all());
        \Session::flash('flash_message_success',"新增导航成功。");
        \Session::flash('flash_message_important',true);
        return redirect(route('navigation.add'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Navigation  $navigation
     * @return \Illuminate\Http\Response
     */
    public function show(Navigation $navigation)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Navigation  $navigation
     * @return \Illuminate\Http\Response
     */
    public function edit(Navigation $navigation)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Navigation  $navigation
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Navigation $navigation)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Navigation  $navigation
     * @return \Illuminate\Http\Response
     */
    public function destroy(Navigation $navigation)
    {
        //
    }
}
