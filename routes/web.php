<?php

use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Auth;
use App\Person;

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
    if (\Auth::check()) {
        if ((auth()->user()->user_level) >= 10) {
            return view('test');
        } else {
            return "you are not allowed to goo..";
        }
    } else {
        return redirect('/login');
    }
});
Route::get('/test2', function () {
    // return now();
return Person::all();
    dd(Person::all());
    dd(\App\Person::all());
    dd(\Auth::check());
    dd(Auth::guest());
    if (!Auth::guest()) {
        return Auth::user();

    } else {
        return "you are guest";
    }
});

// a
// a@test.com
// 123456

Route::get('/locale/{locale}', function ($locale) {
    Session::put('locale', $locale);
    return redirect()->back();
});


// Route::resources([
//     'photos' => 'PhotoController',
//     'posts' => 'PostController'
// ]);



Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
