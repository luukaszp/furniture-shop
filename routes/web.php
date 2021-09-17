<?php

use App\Http\Controllers\CartController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\SubcategoryController;
use App\Http\Controllers\RatingController;
use App\Http\Controllers\UserController;
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

Route::get('/about/company', function () {
    return view('about.company');
});

Route::get('/about/contact', function () {
    return view('about.contact');
});

Route::get('/profile/contact_details', [UserController::class, 'userInfo'], function () {
    return view('profile.contact_details');
});

Route::post('/profile/contact_details/edit', [UserController::class, 'editUser']);

Route::get('/profile/user_orders', function () {
    return view('profile.user_orders');
});

Route::get('/profile', function () {
    return view('profile');
});

Route::get('/furniture', [CategoryController::class, 'allCategories'], function () {
    return view('furniture');
});
Route::get('/furniture/{category}', [ProductController::class, 'productByCategory'], function () {
    return view('furniture/');
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
Route::post('/product/edit/{id}', [ProductController::class, 'edit']);
Route::post('/product/rating', [RatingController::class, 'addRating']);
Route::get('/product/{id}', [ProductController::class, 'showProduct'], function () {
    return view('product');
})->name('product.index');
Route::get('product/rating/{id}', [RatingController::class, 'show']);

Route::post('/cart/store', [CartController::class, 'store'])->name('cart.store');
Route::get('/cart/show', [CartController::class, 'show'], function () {
    return view('shopping_cart');
})->name('cart.show');
Route::put('/cart/update', [CartController::class, 'update'])->name('cart.update');
Route::delete('/cart/delete', [CartController::class, 'delete'])->name('cart.delete');
Route::delete('/cart/destroy', [CartController::class, 'destroy'])->name('cart.destroy');
Route::put('/cart/weight', [CartController::class, 'getWeight'])->name('cart.weight');


Route::post('rating/add', [RatingController::class, 'addRating']);
Route::put('/rating/edit/{id}', [RatingController::class, 'edit']);

/*Route::get('/product/all', [ProductController::class, 'getAll']);
Route::put('/product/edit/{product}', [ProductController::class, 'edit']);
Route::delete('/product/delete/{id}', [ProductController::class, 'delete']);*/

Route::post('/category/store', [CategoryController::class, 'store']);
Route::get('admin_panel/category/{id}', [CategoryController::class, 'show']);
Route::put('/category/edit/{id}', [CategoryController::class, 'edit']);
Route::delete('/category/delete/{id}', [CategoryController::class, 'delete']);

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
