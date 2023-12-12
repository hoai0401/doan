<?php

use App\Http\Controllers\AdminUserController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;



Route::middleware('auth')->group(function(){
    Route::resource('/products',ProductController::class)->except(['index','show']);
    Route::post('logout',[LoginController::class,'logout'])->name('logout');
    //ADMIN
    Route::prefix('admin')->middleware('can:isAdmin')->group(function(){
        Route::get('dashboard',function(){
            return view('admin.dashboard');
        })->name('dashboard');
    });
});
//loại sản phẩm
Route::get('/categories', [CategoryController::class, 'index'])->name('categories.index');
Route::get('/categories/create', [CategoryController::class, 'create'])->name('categories.create');
Route::post('/categories/store', [CategoryController::class, 'store'])->name('categories.store');
Route::put('/categories/{category}', [CategoryController::class, 'update'])->name('categories.update');
Route::get('/categories/{category}', [CategoryController::class, 'edit'])->name('categories.edit');
Route::delete('/categories/{category}', [CategoryController::class, 'destroy'])->name('categories.destroy');

//accout admin
Route::middleware('auth')->group(function () {
    Route::resource('/admin_users', AdminUserController::class)->except(['show']);
});
Route::get('/admin_users', [AdminUserController::class, 'index'])->name('admin_users.index');
Route::get('/admin_users/create', [AdminUserController::class, 'create'])->name('admin_users.create');
Route::post('/admin_users/store', [AdminUserController::class, 'store'])->name('admin_users.store');
Route::get('/admin_users/{admin_user}/edit', [AdminUserController::class, 'edit'])->name('admin_users.edit');
Route::put('/admin_users/{admin_user}', [AdminUserController::class, 'update'])->name('admin_users.update');
Route::delete('/admin_users/{admin_user}', [AdminUserController::class, 'destroy'])->name('admin_users.destroy'); 

//đăng nhập đăng kí
Route::resource('/products',ProductController::class)->only(['index','show']);
Route::get('/login',[LoginController::class,'showForm'])->name('login');
Route::post('/login',[LoginController::class,'authenticate'])->name('login');
Route::get('/signup',[LoginController::class,'showForm'])->name('signup');
Route::post('/signup',[LoginController::class,'authenticate'])->name('signup');

//User
Route::get('users', [UserController::class, 'index'])->name('users.index');
Route::get('users/{user}/edit', [UserController::class, 'edit'])->name('users.edit');
Route::put('users/{user}', [UserController::class, 'update'])->name('users.update');

//Cart
Route::get('/cart', [CartController::class, 'index'])->name('cart.index');

Route::get('/', function () {
    return view('layouts.home');
});
