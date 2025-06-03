<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\AreaController;
use App\Http\Controllers\Api\TrainingCenterController;
use App\Http\Controllers\Api\ComputerController;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');


Route::resource('areas', AreaController::class);
Route::resource('training_centers', TrainingCenterController::class);
Route::resource('computers', ComputerController::class);