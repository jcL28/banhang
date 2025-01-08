<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\User\UserController;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Admin\CategoryController;

Route::get('', function () {
    return view('guest.home');
});


// AUTH
Route::get('login', [AuthController::class, 'login'])->name('login');
Route::post('login', [AuthController::class, 'postLogin'])->name('login.post');
Route::post('logout', [AuthController::class, 'logout'])->name('logout');
Route::get('register', [AuthController::class, 'register'])->name('register');
Route::post('register', [AuthController::class, 'postRegister'])->name('register.post');


// ADMIN
Route::group(['prefix' => 'admin', 'as' => 'admin.'], function () {
    Route::get('login', [AdminController::class, 'login'])->name('login');
    Route::post('login', [AdminController::class, 'postLogin'])->name('login.post');
    Route::get('home', [AdminController::class, 'home'])->name('home');
    Route::post('logout', [AdminController::class, 'logout'])->name('logout');

    // PRODUCT
    Route::group(['prefix' => 'product', 'as' => 'product.'], function () {
        Route::get('list', [ProductController::class, 'list'])->name('list');
        Route::get('add', [ProductController::class, 'addProduct'])->name('add');
        Route::post('add', [ProductController::class, 'postAddProduct'])->name('add.post');
        Route::get('edit/{id}', [ProductController::class, 'editProduct'])->name('edit');
        Route::post('edit/{id}', [ProductController::class, 'postEditProduct'])->name('edit.post');
        Route::get('delete/{id}', [ProductController::class, 'deleteProduct'])->name('delete');
    });

    // CATEGORY
    Route::group(['prefix' => 'category', 'as' => 'category.'], function () {
        Route::get('list', [CategoryController::class, 'list'])->name('list');
        Route::get('add', [CategoryController::class, 'addCategory'])->name('add');
        Route::post('add', [CategoryController::class, 'postAddCategory'])->name('add.post');
        Route::get('edit/{id}', [CategoryController::class, 'editCategory'])->name('edit');
        Route::post('edit/{id}', [CategoryController::class, 'postEditCategory'])->name('edit.post');
        Route::get('delete/{id}', [CategoryController::class, 'deleteCategory'])->name('delete');
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
});


// USER
Route::group(['prefix' => 'user', 'as' => 'user.'], function () {
    Route::get('home', [UserController::class, 'home'])->name('home');
})->middleware('auth');
