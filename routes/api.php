<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\API\apiController;


Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:api');

Route::post('/login',[apiController::class,'login'] );
Route::get('/category',[apiController::class,'category'] );
Route::get('/post',[apiController::class,'post'] );

