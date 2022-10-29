<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\categoryController;
use App\Http\Controllers\roomController;
use App\Http\Controllers\userController;
use App\Http\Controllers\dashboard;
use App\Http\Controllers\configController;
use App\Http\Controllers\permissionController;
use App\Http\Controllers\roleController;

Route::resource('/categories',categoryController::class);
Route::resource('/rooms',roomController::class);
Route::resource('/users',userController::class);
Route::resource('/dashboard',dashboard::class);
Route::resource('/config',configController::class);
Route::resource('/config/permissions',permissionController::class);
Route::resource('/config/roles',roleController::class);