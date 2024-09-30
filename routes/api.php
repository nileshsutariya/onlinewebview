<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\API\apiController;
use App\Http\Controllers\API\ActivitylogController;


Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:api');

// Route::post('/login',[apiController::class,'login'] );
Route::get('/category',[apiController::class,'category'] );
Route::get('/bycategory/{id}',[apiController::class,'bycategory'] );

Route::get('/post',[apiController::class,'post'] );
Route::get('/post/{id}',[apiController::class,'postdetails'] );

Route::post('/activitylog/store',[ActivitylogController::class,'store'] );


