<?php

use App\Http\Controllers\ApprendicesController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AreaController;
use App\Http\Controllers\TrainingCenterController;
use App\Http\Controllers\ComputerController;
use App\Http\Controllers\CourseController;
use App\Http\Controllers\TeachersController;


Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');


Route::resource('areas', AreaController::class);
Route::resource('trainingcenters', TrainingCenterController::class);
Route::resource('teachers', TeachersController::class);
Route::resource('apprendices', ApprendicesController::class);
Route::resource('courses', CourseController::class);
Route::resource('computers', ComputerController::class);