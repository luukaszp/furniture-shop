<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\SubcategoryController;
use App\Http\Controllers\RatingController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\PaymentController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::get('/login', [AuthController::class, 'login'])->name('login');
Route::get('/register', [AuthController::class, 'register'])->name('register');
Route::post('/login/post', [AuthController::class, 'loginUser']);
Route::post('/register/post', [AuthController::class, 'registerUser']);

Route::group(['middleware' => 'auth.jwt'], function () {
    Route::post('/logout', [AuthController::class, 'logout']);
    Route::post('/refresh', [AuthController::class, 'refresh']);
    Route::get('/user-profile', [AuthController::class, 'userProfile']);
        Route::get('/about/company', function () {
        return view('about.company');
    });
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

Route::prefix('admin_panel')->group( function () {
    Route::get('/orders', function () {
        return view('admin_panel.orders');
    });

    Route::get('/products', [ProductController::class, 'index'], function () {
        return view('admin_panel.products');
    });

    Route::get('/products/add', [SubcategoryController::class, 'getAll'], function () {
        return view('admin_panel.add_product');
    });

    Route::get('/categories/add', function () {
        return view('admin_panel.add_category');
    });

    Route::get('/subcategories/add', [CategoryController::class, 'getAllSub'], function () {
        return view('admin_panel.add_subcategory');
    });
});

Route::post('/product/store', [ProductController::class, 'store']);
Route::post('/product/edit/{id}', [ProductController::class, 'edit']);
Route::post('/product/rating', [RatingController::class, 'addRating']);
Route::get('/product/{id}', [ProductController::class, 'showProduct'], function () {
    return view('product');
})->name('product.index');
Route::get('admin_panel/product/{id}', [ProductController::class, 'show']);
Route::delete('/product/delete/{id}', [ProductController::class, 'delete']);

Route::post('/cart/store', [CartController::class, 'store'])->name('cart.store');
Route::get('/cart/show', [CartController::class, 'show'], function () {
    return view('shopping_cart');
})->name('cart.show');
Route::put('/cart/update/{id}', [CartController::class, 'update'])->name('cart.update');
Route::delete('/cart/delete/{id}', [CartController::class, 'delete'])->name('cart.delete');
Route::delete('/cart/destroy', [CartController::class, 'destroy'])->name('cart.destroy');
Route::put('/cart/weight', [CartController::class, 'getWeight'])->name('cart.weight');

Route::post('rating/add', [RatingController::class, 'addRating']);
Route::put('/rating/edit/{id}', [RatingController::class, 'edit']);
Route::get('product/rating/{id}', [RatingController::class, 'show']);

Route::post('/category/store', [CategoryController::class, 'store']);
Route::get('admin_panel/category/{id}', [CategoryController::class, 'show']);
Route::put('/category/edit/{id}', [CategoryController::class, 'edit']);
Route::delete('/category/delete/{id}', [CategoryController::class, 'delete']);

Route::post('/subcategory/store', [SubcategoryController::class, 'store']);
Route::get('admin_panel/subcategory/{id}', [SubcategoryController::class, 'show']);
Route::put('/subcategory/edit/{id}', [SubcategoryController::class, 'edit']);
Route::delete('/subcategory/delete/{id}', [SubcategoryController::class, 'delete']);

Route::get('/admin_panel/customers', function () {
    return view('admin_panel.customers');
});

Route::get('/admin_panel/categories', [CategoryController::class, 'index'], function () {
    return view('admin_panel.categories');
});

Route::get('/admin_panel/subcategories', [SubcategoryController::class, 'index'], function () {
    return view('admin_panel.subcategories');
});

Route::post('payment/store', [PaymentController::class, 'store'])->name('payment.store');

Route::group(['middleware' => 'auth'], function () {
    Route::get('payment', [PaymentController::class, 'payment']);
});
