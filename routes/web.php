<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\AdminUserController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\ForgotPasswordController;
use App\Http\Controllers\ImageController;
use App\Http\Controllers\InvoiceController;
use App\Http\Controllers\SlideshowController;
use App\Http\Controllers\UserOderController;
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
Route::get('/categories/{id}', [HomeController::class, 'show'])->name('User.show');
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

//đăng nhập đăng kí quên mật khẩu
Route::resource('/products',ProductController::class)->only(['index','show']);
Route::get('/login',[LoginController::class,'showForm'])->name('login');
Route::post('/login',[LoginController::class,'authenticate'])->name('login');

Route::get('/signup',[RegisterController::class,'showForm'])->name('signup');
Route::post('/signup',[RegisterController::class,'register'])->name('signup');

Route::get('/forgot-password', [ForgotPasswordController::class, 'showLinkRequestForm'])->name('password.request');
Route::post('/forgot-password', [ForgotPasswordController::class, 'sendResetLinkEmail'])->name('password.email');

//User
Route::get('users', [UserController::class, 'index'])->name('users.index');
Route::get('users/{user}/edit', [UserController::class, 'edit'])->name('users.edit');
Route::put('users/{user}', [UserController::class, 'update'])->name('users.update');


//Cart
Route::get('/cart', [CartController::class, 'index'])->name('cart.index');
Route::get('/cart/add/{productid}/{sizeid}/{colorid}', [CartController::class, 'addcart'])->name('cartadd');
Route::post('/update-cart', [CartController::class, 'updateCart']);


Route::get('/', [HomeController::class, 'index']);


Route::get('/search', [ProductController::class, 'search'])->name('products.search');


//Thanh Toans
Route::get('/checkout', [CartController::class, 'checkoutshow'])->name('checkout');
Route::get('/order', [OrderController::class, 'CreateIncvoice'])->name('order');




//image
Route::get('images/create', [ImageController::class, 'create'])->name('images.create');
Route::post('images/store', [ImageController::class, 'store'])->name('images.store');

//comment
Route::get('/products/{id}/comment', [CommentController::class, 'showcomment'])->name('comments.show');
Route::post('/products/{id}/comment', [CommentController::class, 'storecomment'])->name('comment.store');
Route::post('/comments/{id}/reply', [CommentController::class, 'replycoment'])->name('comment.reply');
Route::delete('/comments/{commentId}/destroy', [CommentController::class, 'destroycomment'])->name('comments.destroy');
Route::delete('/replies/{replyId}/destroy', [CommentController::class,'destroyreply'])->name('replies.destroy');

//slideshows
Route::get('/slideshows', [SlideshowController::class, 'index'])->name('slideshows.index');
Route::get('/slideshows/create', [SlideshowController::class, 'create'])->name('slideshows.create');
Route::post('/slideshows/store', [SlideshowController::class, 'store'])->name('slideshows.store');
Route::delete('/slideshows/{id}', [SlideshowController::class,'destroy'])->name('slideshows.destroy');

Route::get('/admin/invoices', [InvoiceController::class, 'index'])->name('admin.invoices.index');
Route::get('/admin/invoices', [InvoiceController::class, 'index'])->name('admin.invoices.index');
Route::get('/invoices/showstatus',[InvoiceController::class,'showstatus'])->name('show.invoice');
Route::post('invoices/{id}/cancel', [InvoiceController::class,'cancel'])->name('invoices.cancel');
Route::post('markTransporting/{id}', [InvoiceController::class, 'markTransporting'])->name('invoices.markTransporting');
Route::post('markPaid/{id}', [InvoiceController::class, 'markPaid'])->name('invoices.markPaid');

Route::prefix('admin')->middleware('can:isAdmin')->group(function(){
    Route::resource('admin/invoices', InvoiceController::class)->only(['index', 'show']);
    
    Route::post('admin/invoices/{id}/markPaid', [InvoiceController::class, 'markPaid'])->name('admin.invoices.markPaid');
    Route::post('admin/invoices/{id}/cancel', [InvoiceController::class, 'cancel'])->name('admin.invoices.markCancelled');
    Route::post('invoices/{id}/cancel', [InvoiceController::class,'cancel'])->name('invoices.cancel');
});

Route::middleware(['auth'])->group(function () {
    Route::get('/user/orders/{status?}', [UserOderController::class, 'index'])
        ->name('user.orders.index')
        ->where('status', 'all|pending|transporting|paid|canceled');

    Route::get('/user/orders/show/{id}', [UserOderController::class, 'show'])
        ->name('user.orders.show');
    // Thêm các route khác nếu cần
});