<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\Admin\ProductController as AdminProductController;
use App\Http\Controllers\Admin\CategoryController as AdminCategoryController;
use App\Http\Controllers\Admin\OrderController as AdminOrderController;
use App\Http\Controllers\Admin\UserController as AdminUserController;
use App\Http\Controllers\Admin\ReviewController as AdminReviewController;
use App\Http\Controllers\Client\ProductController as ClientProductController;
use App\Http\Controllers\Client\OrderController as ClientOrderController;
use App\Http\Controllers\Client\AddressController as ClientAddressController;
use App\Http\Controllers\Client\ReviewController as ClientReviewController;

Route::get('/', function () {
    return view('welcome');
});

Route::middleware('guest')->group(function () {
    Route::get('/login', [LoginController::class, 'show'])->name('login');
    Route::post('/login', [LoginController::class, 'login']);
    Route::get('/register', [RegisterController::class, 'show']);
    Route::post('/register', [RegisterController::class, 'register']);
});

Route::post('/logout', [LoginController::class, 'logout'])->middleware('auth');

Route::get('/dashboard', [DashboardController::class, 'index'])->middleware('auth');

Route::middleware(['auth', 'admin'])->group(function () {
    Route::get('/admin', function () {
        return view('admin.index');
    });

    Route::resource('admin/products', AdminProductController::class);
    Route::resource('admin/categories', AdminCategoryController::class);
    Route::resource('admin/orders', AdminOrderController::class)->only(['index', 'show', 'update', 'destroy']);
    Route::resource('admin/users', AdminUserController::class)->only(['index', 'edit', 'update', 'destroy']);
    Route::resource('admin/reviews', AdminReviewController::class)->only(['index', 'destroy']);
});

Route::middleware('auth')->group(function () {
    Route::resource('products', ClientProductController::class)->only(['index', 'show']);
    Route::resource('orders', ClientOrderController::class)->only(['index', 'show', 'store']);
    Route::resource('addresses', ClientAddressController::class);
    Route::post('/products/{product}/reviews', [ClientReviewController::class, 'store'])->name('products.reviews.store');
});
