<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\App;

use App\Http\Controllers\ControllerUser;

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

Route::get('/{lang}', function ($lang) {
 
    App::setLocale($lang);
    return view('welcome');
})->name('welcomePage');


Route::get('/login/{lang}', function ($lang) {
 
    App::setLocale($lang);
    return view('login');
})->name('loginPage');

Route::get('/register/{lang}', function ($lang) {
 
    App::setLocale($lang);
    return view('register');
})->name('registerPage');

Route::get('/home/{lang}', function ($lang) {
 
    App::setLocale($lang);
    return view('home');
})->name('homePage');

Route::post('/login/connect', [ControllerUser::class, 'login'], function () {})->name('login');

Route::post('/register/register', [ControllerUser::class, 'register'], function () {})->name('register');
