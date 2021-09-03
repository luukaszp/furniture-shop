<?php

use App\Http\Controllers\ProductController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\SubcategoryController;
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

Route::get('/admin_panel/products', [ProductController::class, 'index'], function () {
    return view('admin_panel.products');
});

Route::get('/admin_panel/products/add', [SubcategoryController::class, 'getAll'], function () {
    return view('admin_panel.add_product');
});

Route::get('/admin_panel/categories/add', function () {
    return view('admin_panel.add_category');
});

Route::get('/admin_panel/subcategories/add', [CategoryController::class, 'getAllSub'], function () {
    return view('admin_panel.add_subcategory');
});

Route::post('/product/store', [ProductController::class, 'store']);
/*Route::get('/product/all', [ProductController::class, 'getAll']);
Route::get('/product/{id}', [ProductController::class, 'show']);
Route::put('/product/edit/{product}', [ProductController::class, 'edit']);
Route::delete('/product/delete/{id}', [ProductController::class, 'delete']);*/

Route::post('/category/store', [CategoryController::class, 'store']);
/*Route::get('/category/all', [CategoryController::class, 'getAll']);
Route::get('/category/{id}', [CategoryController::class, 'show']);
Route::put('/category/edit/{category}', [CategoryController::class, 'edit']);
Route::delete('/category/delete/{id}', [CategoryController::class, 'delete']);*/

Route::post('/subcategory/store', [SubcategoryController::class, 'store']);
/*Route::get('/subcategory/all', [SubcategoryController::class, 'getAll']);
Route::get('/subcategory/{id}', [SubcategoryController::class, 'show']);
Route::put('/subcategory/edit/{subcategory}', [SubcategoryController::class, 'edit']);
Route::delete('/subcategory/delete/{id}', [SubcategoryController::class, 'delete']);*/

Route::get('/admin_panel/customers', function () {
    return view('admin_panel.customers');
});

Route::get('/admin_panel/categories', [CategoryController::class, 'index'], function () {
    return view('admin_panel.categories');
});

Route::get('/admin_panel/subcategories', [SubcategoryController::class, 'index'], function () {
    return view('admin_panel.subcategories');
});


Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
