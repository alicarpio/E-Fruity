<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\FruitController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');


Route::prefix('/v1')->group(function () {
    Route::post('/fruits',[FruitController::class,'store']);

    Route::get('/fruits',[FruitController::class,'index']);

    Route::get('/fruits/{id}',[FruitController::class,'show']);

    Route::put('/fruits/{id}',[FruitController::class,'update']);

    Route::delete('/fruits/{id}',[FruitController::class,'destroy']);

    Route::get('/categories',[CategoryController::class,'index']);

    Route::post('/categories',[CategoryController::class,'store']);

    Route::get('/categories/{id}',[CategoryController::class,'show']);

    Route::delete('/categories/{id}',[CategoryController::class,'destroy']);
});
