<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\categoryController;
use App\Http\Controllers\roomController;
use App\Http\Controllers\userController;
use App\Http\Controllers\dashboard;
use App\Http\Controllers\configController;
use App\Http\Controllers\permissionController;
use App\Http\Controllers\roleController;
use App\Http\Controllers\customerController;
use App\Http\Controllers\statusController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/
Route::resource('/dashboard',dashboard::class);
Route::resource('/users',userController::class);
Route::resource('/users/manage/permissions',permissionController::class);
Route::resource('/users/manage/roles',roleController::class);
Route::resource('/customers',customerController::class);
Route::resource('/rooms',roomController::class);
Route::resource('/categories',categoryController::class);
Route::resource('/reservations/status',statusController::class);
Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
