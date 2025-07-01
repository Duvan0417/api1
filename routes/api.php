<?php

use App\Http\Controllers\ApprendicesController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AreaController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\TrainingCenterController;
use App\Http\Controllers\ComputerController;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');


Route::resource('areas', AreaController::class);
Route::resource('training_centers', TrainingCenterController::class);
Route::resource('computers', ComputerController::class);
Route::prefix('apprendices')->group(function(){
    Route::post('/',[ApprendicesController::class, 'create']);
});
Route::middleware('auth.api')->group(function (){
    Route::get('me',[AuthController::class, 'me']);
    Route::get('/logout',[AuthController::class, 'logout']);
    Route::get('refresh',[AuthController::class, 'refresh']);
});
