<?php

use App\Http\Controllers\ProductController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\SubcategoryController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\PaymentController;
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
Route::get('/login', [AuthController::class, 'login'])->name('login');
Route::get('/password/reset', [AuthController::class, 'passwordReset']);
Route::get('/products', [ProductController::class, 'index']);
Route::get('/cart/show', [CartController::class, 'show'])->name('cart.show');
Route::get('payment', [PaymentController::class, 'payment'])->name('payment');
Route::post('order/store', [OrderController::class, 'store']);

Route::prefix('about')->group( function () {
    Route::get('/contact', function () {
        return view('footer.about.contact');
    });
});

Route::prefix('admin_panel')->group( function () {
        Route::get('/products', [ProductController::class, 'index']);
        Route::get('/products/add', [SubcategoryController::class, 'getAll']);
        Route::get('/categories/add', [CategoryController::class, 'addCategoryView']);
        Route::get('/subcategories/add', [CategoryController::class, 'getAllSub']);
});

Route::get('product/{id}', [ProductController::class, 'showProduct'])->name('product.index');
