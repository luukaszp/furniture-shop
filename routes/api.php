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
use App\Http\Controllers\OrderController;
use App\Http\Controllers\ProfileController;
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
Route::middleware('auth:sanctum')->get("/refresh", [AuthController::class, 'refresh']);

Route::get('/login', [AuthController::class, 'login'])->name('login');
Route::get('/register', [AuthController::class, 'register'])->name('register');
Route::post('/login/post', [AuthController::class, 'loginUser']);
Route::post('/register/post', [AuthController::class, 'registerUser']);

Route::get('/customers', function () {
    return view('unauthorized');
});

Route::prefix('about')->group( function () {
    Route::get('/company', function () {
        return view('about.company');
    });
    Route::get('/contact', function () {
        return view('about.contact');
    });
});

Route::prefix('furniture')->group( function () {
    Route::get('/', [CategoryController::class, 'allCategories']);
    Route::get('/{category}', [ProductController::class, 'productByCategory']);
});

Route::prefix('cart')->group( function () {
    Route::post('/store', [CartController::class, 'store'])->name('cart.store');
    Route::get('/show', [CartController::class, 'show'])->name('cart.show');
    Route::put('/update/{id}', [CartController::class, 'update'])->name('cart.update');
    Route::delete('/delete/{id}', [CartController::class, 'delete'])->name('cart.delete');
    Route::delete('/destroy', [CartController::class, 'destroy'])->name('cart.destroy');
    Route::put('/weight', [CartController::class, 'getWeight'])->name('cart.weight');
});

Route::get('product/{id}', [ProductController::class, 'showProduct'])->name('product.index');
Route::get('product/rating/{id}', [RatingController::class, 'show']);

Route::group(['middleware' => ['auth:sanctum']], function () {
    Route::post('/logout', [AuthController::class, 'logout']);

    Route::prefix('profile')->group( function () {
        Route::get('/contact_details', [UserController::class, 'userInfo']);
        Route::post('/contact_details/edit', [UserController::class, 'editUser']);
        Route::get('/user_orders', [ProfileController::class, 'userOrders']);
        Route::get('/', [ProfileController::class, 'index']);
    });

    Route::prefix('admin_panel')->group( function () {
        Route::get('/orders', [OrderController::class, 'index']);
        Route::get('/products', [ProductController::class, 'index']);
        Route::get('/products/add', [SubcategoryController::class, 'getAll']);
        Route::get('/categories/add', [CategoryController::class, 'addCategoryView']);
        Route::get('/subcategories/add', [CategoryController::class, 'getAllSub']);
        Route::get('/product/{id}', [ProductController::class, 'show']);
        Route::get('/category/{id}', [CategoryController::class, 'show']);
        Route::get('/subcategory/{id}', [SubcategoryController::class, 'show']);
        Route::get('/categories', [CategoryController::class, 'index']);
        Route::get('/subcategories', [SubcategoryController::class, 'index']);
        Route::get('/customers', function () {
            return view('admin_panel.customers');
        });
    });

    Route::prefix('rating')->group( function () {
        Route::post('/add', [RatingController::class, 'addRating']);
        Route::put('/edit/{id}', [RatingController::class, 'edit']);
    });

    Route::prefix('product')->group( function () {
        Route::post('/store', [ProductController::class, 'store']);
        Route::post('/edit/{id}', [ProductController::class, 'edit']);
        Route::delete('/delete/{id}', [ProductController::class, 'delete']);
    });

    Route::prefix('category')->group( function () {
        Route::post('/store', [CategoryController::class, 'store']);
        Route::put('/edit/{id}', [CategoryController::class, 'edit']);
        Route::delete('/delete/{id}', [CategoryController::class, 'delete']);
    });

    Route::prefix('subcategory')->group( function () {
        Route::post('/store', [SubcategoryController::class, 'store']);
        Route::put('/edit/{id}', [SubcategoryController::class, 'edit']);
        Route::delete('/delete/{id}', [SubcategoryController::class, 'delete']);
    });

    Route::post('payment/store', [PaymentController::class, 'store'])->name('payment.store');
    Route::get('payment', [PaymentController::class, 'payment']);

    Route::put('/order/realization/{id}', [OrderController::class, 'realization']);
    Route::put('/order/received/{id}', [OrderController::class, 'received']);
    Route::get('/order/{id}', [OrderController::class, 'show']);
    Route::get('/order/fetch/{id}', [OrderController::class, 'showOrder']);
    Route::post('order/store', [OrderController::class, 'store']);
    Route::put('/order/edit', [OrderController::class, 'edit']);
});
