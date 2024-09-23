<?php

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
Route::get('/dashboard', [UserController::class, 'home'])->name('dashboard');

    Route::get('/post',[PostController::class,'index'] )->name('post.index');
    Route::post('/post/store',[PostController::class,'store'] )->name('post.store');
    Route::get('/post/delete/{id}',[PostController::class,'delete'] )->name('post.delete');
    Route::post('/post/update',[PostController::class,'update'] )->name('post.update');
    Route::get('/post/edit/{id}',[PostController::class,'edit'] )->name('post.edit');
