<?php

use App\Http\Controllers\CategoryController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\LoginController;

// Route::get('/register', function () {
//     return view('registration');
// });

Route::get('/', [LoginController::class, 'index'])->name('loginform');
Route::post('/login', [LoginController::class, 'login'])->name('login');
Route::post('/logout', [LoginController::class, 'logout'])->name('logout');

Route::post('/store',[UserController::class,'store'])->name('store');
Route::get('/register', [UserController::class, 'index'])->name('register');
Route::get('/dashboard', [UserController::class, 'home'])->name('dashboard');

Route::get('/category', [CategoryController::class, 'index'])->name('categories.index');
Route::post('/categories', [CategoryController::class, 'store'])->name('categories.store');
// Route::get('categories/{category}', [CategoryController::class, 'show'])->name('categories.show');
Route::get('/categories/edit/{id}',[CategoryController::class,'edit'] )->name('categories.edit');
Route::post('/categories/update',[CategoryController::class,'update'] )->name('categories.update');
Route::get('/categories/delete/{id}',[CategoryController::class,'delete'] )->name('categories.delete');

Route::get('/userdashboard', [UserController::class, 'dashboard'])->name('userdashboard');