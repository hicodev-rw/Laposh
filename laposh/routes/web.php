<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\categoryController;
use App\Http\Controllers\roomController;
use App\Http\Controllers\userController;
use App\Http\Controllers\dashboard;
use App\Http\Controllers\infoController;
use App\Http\Controllers\configController;
use App\Http\Controllers\permissionController;
use App\Http\Controllers\roleController;
use App\Http\Controllers\reservationController;
use App\Http\Controllers\customerController;
use App\Http\Controllers\statusController;
use App\Http\Controllers\webController;

//Authentication
Route::get('/management/login', function () {
    return view('management.static.login');
});
Route::get('/login', function () {
    return view('web.login');
});

Route::post('/management/login',[userController::class,'login']);
Route::GET('/management/logout',[userController::class,'logout']);
Route::post('/login',[customerController::class,'login']);
Route::GET('/logout',[customerController::class,'logout']);

//Client site

Route::GET('/',[webController::class,'index']);
Route::GET('/rooms',[webController::class,'rooms']);
Route::GET('/room/details/{id}',[webController::class,'show']);
Route::get('/list',[roomController::class,'list']);
Route::get('/room/reserve/{id}',[webController::class,'bookingForm']);

Route::group(['middleware'=>'auth:sanctum'], function () {
    Route::resource('/management/users/manage/permissions',permissionController::class);
    Route::resource('/management/roles',roleController::class);
    Route::PATCH('/management/users/manage/grant/permissions/{id}',[userController::class,'grantPermissions']);
    Route::PATCH('/management/users/manage/revoke/permissions/{id}',[userController::class,'revokePermissions']);
    Route::resource('/management/settings',infoController::class);
    Route::post('/management/info/logo',[infoController::class,'changeLogo']);
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
    Route::POST('/customer/booking',[reservationController::class,'store']);
    Route::patch('/management/reservations/cancel/{id}',[reservationController::class,'cancelBooking']);
    Route::get('/management/check-in-list',[reservationController::class,'readForCheckIn']);
    Route::get('/management/check-out-list',[reservationController::class,'readForCheckOut']);
    Route::patch('management/reservations/checkin/{id}',[reservationController::class,'checkin']);
    Route::patch('/management/reservations/checkout/{id}',[reservationController::class,'checkout']);
    Route::resource('/management/reservation/status',statusController::class);
    
    //customers
    Route::resource('/management/customers',customerController::class);


     //users
     Route::resource('/management/users',userController::class); 
     Route::get('/management/user/profile',[userController::class,'profile']);
     Route::post('/management/users/avatar/upload/{id}',[userController::class,'storeAvatar']);
  });




//customers

Route::resource('/customer',customerController::class);
Route::POST('/customer/login',[customerController::class,'login']);
//rooms
// Route::resource('/rooms',roomController::class);
Route::resource('/room/categories',categoryController::class);
Route::get('/room/popular',[roomController::class,'popular']);

//hotel info

