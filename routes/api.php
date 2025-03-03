<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TaskController;
use App\Http\Controllers\JobPostController;
use App\Http\Controllers\EmployeeController;

// Route::get('/user', function (Request $request) {
//     return $request->user();
// })->middleware('auth:sanctum');

Route::apiResource('employee', EmployeeController::class)->middleware('auth:sanctum');
Route::apiResource('jobpost', JobPostController::class);
Route::apiResource('task', TaskController::class);