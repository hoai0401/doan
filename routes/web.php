<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\ProductController;
use Illuminate\Support\Facades\Route;

Route::middleware('auth')->group(function(){
    Route::resource('/products',ProductController::class)->except(['index'.'show']);
    Route::post('logout',[LoginController::class,'logout'])->name('logout');
    //ADMIN
    Route::prefix('admin')->middleware('can:isAdmin')->group(function(){
        Route::get('dashboard',function(){
            return view('admin.dashboard');
        })->name('dashboard');
    });
});


Route::get('/login',[LoginController::class,'showForm'])->name('login');
Route::post('/login',[LoginController::class,'authenticate'])->name('login');

Route::get('/', function () {
    return view('home');
});
