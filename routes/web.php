<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\SliderController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\LoginController;

Route::get('/', function () {
    return redirect()->route('loginform');
});

Route::get('/login', [LoginController::class, 'index'])->name('loginform');
Route::post('/login-check', [LoginController::class, 'login'])->name('login');
Route::post('/logout', [LoginController::class, 'logout'])->name('logout');

Route::post('/store',[UserController::class,'store'])->name('store');
Route::get('/register', [UserController::class, 'index'])->name('register');
Route::get('/dashboard', [UserController::class, 'dashboard'])->name('dashboard');

Route::get('/post',[PostController::class,'index'] )->name('post.index');
Route::post('/post/store',[PostController::class,'store'] )->name('post.store');
Route::get('/post/delete/{id}',[PostController::class,'delete'] )->name('post.delete');
Route::post('/post/update',[PostController::class,'update'] )->name('post.update');
Route::get('/post/edit/{id}',[PostController::class,'edit'] )->name('post.edit');

Route::get('/category', [CategoryController::class, 'index'])->name('categories.index');
Route::post('/categories', [CategoryController::class, 'store'])->name('categories.store');
Route::get('/categories/edit/{id}',[CategoryController::class,'edit'] )->name('categories.edit');
Route::post('/categories/update',[CategoryController::class,'update'] )->name('categories.update');
Route::get('/categories/delete/{id}',[CategoryController::class,'delete'] )->name('categories.delete');

Route::get('/slider', [SliderController::class, 'index'])->name('slider.index');
Route::post('/slider/store', [SliderController::class, 'store'])->name('slider.store');
Route::get('/slider/edit/{id}', [SliderController::class, 'edit'])->name('slider.edit');
Route::post('/slider/update/',[SliderController::class,'update'] )->name('slider.update');
Route::get('/slider/delete/{id}',[SliderController::class,'delete'] )->name('slider.delete');

// Route::get('/ads')