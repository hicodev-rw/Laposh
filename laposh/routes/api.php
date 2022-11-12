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


//room routes
Route::resource('/customers',customerController::class);
Route::get('/rooms',[roomController::class,'index'])->middleware(['auth','can:dashbord']);
Route::get('/rooms/{id}',[roomController::class,'show']);
Route::post('/rooms',[roomController::class,'store'])->middleware(['auth:sanctum','can:create-room']);
Route::patch('/rooms/{id}',[roomController::class,'update'])->middleware(['auth:sanctum','can:edit-room']);
Route::patch('/rooms/edit',[roomController::class,'edit'])->middleware(['auth:sanctum','can:edit-room']);
Route::delete('/rooms',[roomController::class,'destroy'])->middleware(['auth:sanctum','can:delete-room']);




//analytics
Route::get('/dashboard',[dashboard::class,'index'])->middleware(['auth','can:dashbord']);


//users
Route::post('/login',[userController::class,'login']);
//  Route::group(['middleware'=>['auth:sanctum','role:sdmin']], function () {
     Route::resource('/users',userController::class); 
     Route::post('/users/avatar/upload/{id}',[userController::class,'storeAvatar']);
     Route::resource('/users/manage/permissions',permissionController::class);
     Route::resource('/users/manage/roles',roleController::class);
//  });

//customers



Route::POST('/customer/login',[customerController::class,'login']);
//rooms
// Route::resource('/rooms',roomController::class);
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


// Route::group(['middleware'=>['auth:sanctum' AND 'can:create-reservation']], function () {

// });



