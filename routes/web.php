<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\User\UserController;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\User\CartController;
use App\Http\Controllers\Admin\OrderController;
use App\Http\Controllers\User\CheckoutController;
use App\Http\Controllers\IndexController;
use App\Http\Middleware\CheckLoginMiddleware;
use Illuminate\Foundation\Auth\EmailVerificationRequest;


Route::get('', [IndexController::class, 'index'])->name('home');
Route::get('products', [ProductController::class, 'index'])->name('products');
Route::get('email/verify/{id}/{hash}', [AuthController::class, 'verifyUser'])->name('verification.verify');

// SEARCH
Route::get('/search', [IndexController::class, 'search'])->name('product.search');


// USER PROFILE
Route::group(['middleware' => ['auth']], function () {
    Route::get('profile', [UserController::class, 'profile'])->name('profile');
    Route::get('profile/edit', [UserController::class, 'editProfile'])->name('profile.edit');
    Route::post('profile/update', [UserController::class, 'updateProfile'])->name('profile.update');
});

// VIEW-DETAILS
Route::get('product/view-details/{id}', [ProductController::class, 'viewDetails'])->name('product.view-details');

// CART
Route::get('cart', [CartController::class, 'index'])->name('cart');
Route::put('/cart/updateCart', [CartController::class, 'updateCart'])->name('cart.update');
Route::post('/cart/{id}', [CartController::class, 'addToCart'])->name('cart.add');
Route::delete('/cart', [CartController::class, 'remove'])->name('cart.remove');

// CHECKOUT
Route::group(['middleware' => ['auth']], function () {
    Route::get('checkout', [CheckoutController::class, 'showCheckoutForm'])->name('checkout.show');
    Route::post('checkout', [CheckoutController::class, 'processCheckout'])->name('checkout.process');
});

// ORDER TRACKING
Route::get('order-tracking', [OrderController::class, 'showOrderTrackingForm'])->name('order-tracking.show');
Route::post('order-tracking', [OrderController::class, 'trackOrder'])->name('order-tracking.track');

// AUTH
Route::get('login', [AuthController::class, 'login'])->name('login');
Route::post('login', [AuthController::class, 'postLogin'])->name('login.post');
Route::post('logout', [AuthController::class, 'logout'])->name('logout');
Route::get('register', [AuthController::class, 'register'])->name('register');
Route::post('register', [AuthController::class, 'postRegister'])->name('register.post');

// Forgot Password
Route::get('forgot-password', [AuthController::class, 'forgotPassword'])->name('forgot-password');
Route::post('forgot-password', [AuthController::class, 'postForgotPassword'])->name('forgot-password.post');

// Reset Password
Route::get('/reset-password/{token}', [AuthController::class, 'showResetPasswordForm'])->name('password.reset');
Route::post('/reset-password', [AuthController::class, 'resetPassword'])->name('password.update');

// Change Password
Route::get('change-password', [AuthController::class, 'showChangePasswordForm'])->name('change-password');
Route::post('change-password', [AuthController::class, 'changePassword'])->name('change-password.post');

// ADMIN
Route::group(['prefix' => 'admin', 'as' => 'admin.'], function () {
    Route::get('login', [AdminController::class, 'login'])->name('login');
    Route::post('login', [AdminController::class, 'postLogin'])->name('login.post');
});

Route::group(['prefix' => 'admin', 'as' => 'admin.', 'middleware' => CheckLoginMiddleware::class], function () {
    Route::get('home', [AdminController::class, 'home'])->name('home');
    Route::post('logout', [AdminController::class, 'logout'])->name('logout');

    // PRODUCT
    Route::group(['prefix' => 'product', 'as' => 'product.'], function () {
        Route::get('list', [ProductController::class, 'list'])->name('list');
        Route::get('add', [ProductController::class, 'addProduct'])->name('add');
        Route::post('add', [ProductController::class, 'postAddProduct'])->name('add.post');
        Route::get('edit/{id}', [ProductController::class, 'editProduct'])->name('edit');
        Route::post('edit/{id}', [ProductController::class, 'postEditProduct'])->name('edit.post');
        Route::delete('delete/{id}', [ProductController::class, 'deleteProduct'])->name('delete');
    });

    // CATEGORY
    Route::group(['prefix' => 'category', 'as' => 'category.'], function () {
        Route::get('list', [CategoryController::class, 'list'])->name('list');
        Route::get('add', [CategoryController::class, 'addCategory'])->name('add');
        Route::post('add', [CategoryController::class, 'postAddCategory'])->name('add.post');
        Route::get('edit/{id}', [CategoryController::class, 'editCategory'])->name('edit');
        Route::post('edit/{id}', [CategoryController::class, 'postEditCategory'])->name('edit.post');
        Route::delete('delete/{id}', [CategoryController::class, 'deleteCategory'])->name('delete');
    });

    // CUSTOMER
    Route::group(['prefix' => 'manage/customer', 'as' => 'customer.'], function () {
        Route::get('list', [UserController::class, 'cusList'])->name('list');
        Route::get('edit/{id}', [UserController::class, 'editCus'])->name('edit');
        Route::post('edit/{id}', [UserController::class, 'postEditCus'])->name('edit.post');
        Route::delete('delete/{id}', [UserController::class, 'deleteCus'])->name('delete');
    });

    // EMPLOYEE 
    Route::group(['prefix' => 'manage/employee', 'as' => 'employee.'], function () {
        Route::get('list', [UserController::class, 'empList'])->name('list');
        Route::get('edit/{id}', [UserController::class, 'editEmp'])->name('edit');
        Route::post('edit/{id}', [UserController::class, 'postEditEmp'])->name('edit.post');
        Route::delete('delete/{id}', [UserController::class, 'deleteEmp'])->name('delete');
    });

    // ORDER
    Route::group(['prefix' => 'manage/order', 'as' => 'order.'], function () {
        Route::get('list', [OrderController::class, 'list'])->name('list');
        Route::get('detail/{id}', [OrderController::class, 'detail'])->name('detail');
        Route::post('approve/{id}', [OrderController::class, 'approveOrder'])->name('approve');
        Route::post('reject/{id}', [OrderController::class, 'rejectOrder'])->name('reject');
        Route::post('delivering/{id}', [OrderController::class, 'deliveringOrder'])->name('delivering');
        Route::post('delivered/{id}', [OrderController::class, 'deliveredOrder'])->name('delivered');
        Route::post('paid/{id}', [OrderController::class, 'paidOrder'])->name('paid');
    });
});
