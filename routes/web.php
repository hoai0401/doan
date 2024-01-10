<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\AdminUserController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\ForgotPasswordController;
use Illuminate\Support\Facades\Route;

// Đăng nhập
Route::get('/login', [LoginController::class, 'showForm'])->name('login');
Route::post('/login', [LoginController::class, 'authenticate'])->name('login');
//Đăng kí
Route::get('/signup', [RegisterController::class, 'showForm'])->name('signup');
Route::post('/signup', [RegisterController::class, 'register'])->name('signup');
//Quên mật khẩu
Route::get('/forgot-password', [ForgotPasswordController::class, 'showLinkRequestForm'])->name('password.request');
Route::post('/forgot-password', [ForgotPasswordController::class, 'sendResetLinkEmail'])->name('password.email');

// Trang chủ và hiển thị sản phẩm
Route::get('/', [HomeController::class, 'index']);
Route::get('/products', [ProductController::class, 'index'])->name('products.index');
Route::get('/products/{product}', [ProductController::class, 'show'])->name('products.show');


// Loại sản phẩm
Route::get('/categories', [CategoryController::class, 'index'])->name('categories.index');
Route::get('/categories/create', [CategoryController::class, 'create'])->name('categories.create');
Route::get('/categories/{id}', [HomeController::class, 'show'])->name('categories.show');
Route::post('/categories/store', [CategoryController::class, 'store'])->name('categories.store');
Route::put('/categories/{category}', [CategoryController::class, 'update'])->name('categories.update');
Route::get('/categories/{category}', [CategoryController::class, 'edit'])->name('categories.edit');
Route::delete('/categories/{category}', [CategoryController::class, 'destroy'])->name('categories.destroy');

// Giỏ hàng
Route::get('/cart', [CartController::class, 'index'])->name('cart.index');
Route::post('cart/{id}', 'CartController@addcart')->name('cart.add');

// Quản trị người dùng
Route::middleware('auth')->group(function () {
    Route::resource('/admin_users', AdminUserController::class)->except(['show']);
});

// Quản trị sản phẩm
Route::middleware('auth')->group(function () {
    Route::resource('/products', ProductController::class)->except(['index', 'show']);
});

// Quản trị viên
Route::prefix('admin')->middleware('can:isAdmin')->group(function () {
    Route::get('dashboard', function () {
        return view('admin.dashboard');
    })->name('dashboard');
});

// Người dùng
Route::get('users', [UserController::class, 'index'])->name('users.index');
Route::get('users/{user}/edit', [UserController::class, 'edit'])->name('users.edit');
Route::put('users/{user}', [UserController::class, 'update'])->name('users.update');

// Tìm kiếm sản phẩm
Route::get('/search', [ProductController::class, 'search'])->name('products.search');
