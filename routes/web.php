<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\LoginController;

// Route::get('/register', function () {
//     return view('registration');
// });

Route::get('/', [LoginController::class, 'index'])->name('loginform');
Route::post('/login', [LoginController::class, 'login'])->name('login');

Route::post('/store',[UserController::class,'store'])->name('store');
Route::get('/register', [UserController::class, 'index'])->name('register');
Route::get('/dashboard', [UserController::class, 'home'])->name('dashboard');
