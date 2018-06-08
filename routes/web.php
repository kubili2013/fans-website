<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('home')->with(['navigations'=>\App\Models\Navigation::all()]);
})->name('home');



Route::get('/about', function () {
    return view('about');
})->name('about');


// 第三方登录
Route::get('/oauth/{name}', 'OAuthController@redirectToProvider')->name('oauth');
Route::get('/oauth/{name}/callback', 'OAuthController@handleProviderCallback')->name('callback');
Auth::routes();

// **********************************************************

Route::get('/videos', "VideoController@index")->name('videos');
Route::get('/video/page', "VideoController@get")->name('video.page');
Route::get('/video/add',"VideoController@create")->name('video.add');
Route::post('/video/add',"VideoController@store")->name('video.store');



Route::get('/images', "ImageController@index")->name('images');
Route::get('/images/page', "ImageController@get")->name('image.page');
Route::get('/image/add',"ImageController@create")->name('image.add');
Route::post('/image/add',"ImageController@store")->name('image.store');

Route::get('/navigation/add',"NavigationController@create")->middleware('role:admin')->name('navigation.add');
Route::post('/navigation/add',"NavigationController@store")->middleware('role:admin')->name('navigation.store');


Route::get('/goods', "GoodsController@index")->name('goods');
Route::get('/goods/page', "GoodsController@get")->name('goods.page');
Route::get('/goods/add',"GoodsController@create")->middleware('role:admin')->name('goods.add');
Route::post('/goods/add',"GoodsController@store")->middleware('role:admin')->name('goods.store');

Route::get('/news', "NewsController@index")->name('news');
Route::get('/news/page', "NewsController@get")->name('news.page');
Route::get('/news/add',"NewsController@create")->name('news.add');
Route::post('/news/add',"NewsController@store")->name('news.store');


Route::get('/fans', "FansController@index")->name('fans');

// **********************************************************

Route::get('/ikun/{user_id}', function () {
    return view('about');
})->name('my.index');


Route::get('/qiniu/token', "QiniuController@token")->name('qiniu.token');

