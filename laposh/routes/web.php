<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\categoryController;
use App\Http\Controllers\roomController;
use App\Http\Controllers\userController;


Route::get('/', function () {
    return view('web.web.index');
});
Route::resource('/categories',categoryController::class);
Route::resource('/rooms',roomController::class);
Route::resource('/users',userController::class);