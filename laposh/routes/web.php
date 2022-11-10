<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\categoryController;
use App\Http\Controllers\roomController;
use App\Http\Controllers\userController;
use App\Http\Controllers\dashboard;
use App\Http\Controllers\configController;
use App\Http\Controllers\permissionController;
use App\Http\Controllers\roleController;

//room routes
Route::get('/rooms',[roomController::class,'index']);
Route::get('/rooms/{id}',[roomController::class,'show']);
Route::post('/rooms',[roomController::class,'store']);
Route::patch('/rooms/{id}',[roomController::class,'update'])->middleware(['auth:sanctum','can:edit-room']);
Route::patch('/rooms/edit',[roomController::class,'edit'])->middleware(['auth:sanctum','can:edit-room']);
Route::delete('/rooms',[roomController::class,'destroy'])->middleware(['auth:sanctum','can:delete-room']);




//analytics
Route::get('/dashboard',[dashboard::class,'index']);
//->middleware(['auth:sanctum','can:dashbord']);


//users
Route::post('/login',[userController::class,'login']);
 Route::group(['middleware'=>['auth:sanctum','role:admin']], function () {
     Route::resource('/users',userController::class); 
     Route::post('/users/avatar/upload/{id}',[userController::class,'storeAvatar']);
     Route::resource('/users/manage/permissions',permissionController::class);
     Route::resource('/users/manage/roles',roleController::class);
 });

//customers

Route::resource('/customers',customerController::class);

Route::POST('customer/login',[customerController::class,'login']);
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