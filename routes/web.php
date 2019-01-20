<?php

use Illuminate\Support\Facades\Session;

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
// $locale = "en";
// $locale = "ar";
    // App::setLocale($locale);

Route::get('/', function () {
    return view('welcome');
});
Route::get('/test', function () {
    if ((auth()->user()->user_level)>=10) {
        return view('test');
    }else{
        return "you are not allowed to goo..";
    }
});

// a
// a@test.com
// 123456

Route::get('/locale/{locale}', function ($locale) {
    Session::put('locale', $locale);
    return redirect()->back();
});



Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
