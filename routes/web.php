<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

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
    return view('main');
});

Route::get('/about/company', function () {
    return view('about.company');
});

Route::get('/about/contact', function () {
    return view('about.contact');
});

Route::get('/product/1', function () {
    return view('product');
});

Route::get('/shopping_cart', function () {
    return view('shopping_cart');
});

Route::get('/profile', function () {
    return view('profile');
});


Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
