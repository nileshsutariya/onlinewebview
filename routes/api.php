<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdsLinkController;
use App\Http\Controllers\API\apiController;
use App\Http\Controllers\API\ActivitylogController;


Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:api');

// Route::post('/login',[apiController::class,'login'] );
Route::post('/category',[apiController::class,'category'] );
Route::post('/bycategory',[apiController::class,'bycategory'] );
Route::post('/most_famous',[apiController::class,'most_famous'] );

Route::post('/post',[apiController::class,'post'] );
Route::post('/posts',[apiController::class,'postdetails'] );

Route::post('/activitylog/store',[ActivitylogController::class,'store'] );

Route::post('/slider',[apiController::class,'slider'] );

Route::post('/ads-links', [apiController::class, 'index']);
Route::post('/ads-links', [AdsLinkController::class, 'store']);
