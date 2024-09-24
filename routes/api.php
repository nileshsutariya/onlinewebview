<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\API\apiController;


Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:api');

Route::get('/post',[apiController::class,'index'] )->name('post.index');

Route::get('/category',[apiController::class,'category'] )->name('category.index');
