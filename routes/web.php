<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\LoginController;

// Route::get('/register', function () {
//     return view('registration');
// });

Route::get('/', [LoginController::class, 'index'])->name('login');
Route::post('/login', [LoginController::class, 'login'])->name('login');

Route::get('/register', [UserController::class, 'index'])->name('register');
Route::post('/store',[UserController::class,'store'])->name('store');
