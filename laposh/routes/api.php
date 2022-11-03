<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\categoryController;
use App\Http\Controllers\roomController;
use App\Http\Controllers\userController;
use App\Http\Controllers\dashboard;
use App\Http\Controllers\infoController; 
use App\Http\Controllers\permissionController;
use App\Http\Controllers\roleController;
use App\Http\Controllers\customerController;
use App\Http\Controllers\statusController;
use App\Http\Controllers\reservationController;

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

//analytics
Route::resource('/dashboard',dashboard::class);

//users
Route::resource('/users',userController::class);
Route::post('/users/avatar/upload/{id}',[userController::class,'storeAvatar']);
Route::resource('/users/manage/permissions',permissionController::class);
Route::resource('/users/manage/roles',roleController::class);
<<<<<<< HEAD
Route::POST('/login',[userController::class,'login']);
=======
Route::post('/login',[userController::class,'login']);
>>>>>>> d9df943a00714b1e74a8512d2a142a2ce020ce01

//customers
Route::resource('/customers',customerController::class);
Route::POST('customer/login',[customerController::class,'login']);
//rooms
Route::resource('/rooms',roomController::class);
Route::get('/list',[roomController::class,'list']);
Route::POST('/room/avatar/save/{id}',[roomController::class,'addRoomImages']);
Route::resource('/categories',categoryController::class);
Route::get('/room/popular',[roomController::class,'popular']);

//bookings
Route::resource('/reservations',reservationController::class);
Route::patch('/reservations/cancel/{id}',[reservationController::class,'cancelBooking']);
Route::get('/reservations/checkin/list',[reservationController::class,'readForCheckIn']);
Route::get('/reservations/checkout/list',[reservationController::class,'readForCheckOut']);
Route::patch('/reservations/checkin/{id}',[reservationController::class,'checkin']);
Route::patch('/reservations/checkout/{id}',[reservationController::class,'checkout']);
Route::resource('/reservation/status',statusController::class);


//hotel info
Route::resource('/hotel/info',infoController::class);
Route::post('/info/logo',[infoController::class,'uploadLogo']);


Route::group(['middleware'=>['auth:sanctum']], function () {
    Route::resource('/reservations',reservationController::class);
});
Route::middleware('admin')->group(function () {
    Route::resource('/rooms',roomController::class);
 });

