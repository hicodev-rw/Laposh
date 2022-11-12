<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\categoryController;
use App\Http\Controllers\roomController;
use App\Http\Controllers\userController;
use App\Http\Controllers\dashboard;
use App\Http\Controllers\configController;
use App\Http\Controllers\permissionController;
use App\Http\Controllers\roleController;
use App\Http\Controllers\reservationController;
use App\Http\Controllers\statusController;

//Authentication
Route::get('login', function () {
    return view('management.static.login');
});
Route::post('/login',[userController::class,'login']);
Route::GET('/logout',[userController::class,'logout']);

//Client homepage
Route::get('/', function () {
    return view('web.web.home');
});


Route::group(['middleware'=>'auth:sanctum'], function () {
    //dashboard
    Route::get('/management/dashboard',[dashboard::class,'index']);
    //rooms
    Route::get('/management/rooms',[roomController::class,'index']);
    Route::get('/management/rooms/{id}',[roomController::class,'show']);
    Route::post('/management/rooms',[roomController::class,'store']);
    Route::POST('/management/room/images/{id}',[roomController::class,'updateRoomImages']);
    Route::patch('/management/rooms/{id}',[roomController::class,'update']);
    Route::get('/management/rooms/{id}/edit',[roomController::class,'edit']);
    Route::get('/management/edit-room-images/{id}',[roomController::class,'editImages']);
    Route::delete('/management/rooms',[roomController::class,'destroy']);
    Route::resource('/management/categories',categoryController::class);

    //bookings
    Route::resource('/management/bookings',reservationController::class);
    Route::patch('/management/reservations/cancel/{id}',[reservationController::class,'cancelBooking']);
    Route::get('/management/check-in-list',[reservationController::class,'readForCheckIn']);
    Route::get('/management/check-out-list',[reservationController::class,'readForCheckOut']);
    Route::patch('/reservations/checkin/{id}',[reservationController::class,'checkin']);
    Route::patch('/management/reservations/checkout/{id}',[reservationController::class,'checkout']);
    Route::resource('/management/reservation/status',statusController::class);
    
    //customers
    Route::resource('/management/customers',customerController::class);

    //hotel administration
    Route::resource('/management/hotel/info',infoController::class);
    Route::post('/management/info/logo',[infoController::class,'uploadLogo']);

     //users
     Route::resource('/management/users',userController::class); 
     Route::post('/management/users/avatar/upload/{id}',[userController::class,'storeAvatar']);
     Route::resource('/management/users/manage/permissions',permissionController::class);
     Route::resource('/management/users/manage/roles',roleController::class);
  });




//customers


Route::POST('customer/login',[customerController::class,'login']);
//rooms
// Route::resource('/rooms',roomController::class);
Route::get('/list',[roomController::class,'list']);
Route::resource('/room/categories',categoryController::class);
Route::get('/room/popular',[roomController::class,'popular']);

//hotel info

