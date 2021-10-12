<?php

use App\Http\Controllers\ProductController;
use App\Http\Controllers\AuthController;
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

Route::get('/', [ProductController::class, 'mainDisplay'], function () {
    return view('main');
});

Route::get('/new-password/{id}', [AuthController::class, 'newPassword'])->name('new-password');

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
