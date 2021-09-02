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

Route::get('/admin_panel/orders', function () {
    return view('admin_panel.orders');
});

Route::get('/admin_panel/products', function () {
    return view('admin_panel.products');
});

Route::get('/admin_panel/products/add', function () {
    return view('admin_panel.add_product');
});

Route::get('/admin_panel/customers', function () {
    return view('admin_panel.customers');
});

Route::get('/admin_panel/categories', function () {
    return view('admin_panel.categories');
});

Route::get('/admin_panel/subcategories', function () {
    return view('admin_panel.subcategories');
});


Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
