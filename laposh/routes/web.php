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
use App\Http\Controllers\reports;
use App\Http\Controllers\subscriptionController;
use App\Http\Controllers\paymentController;
use App\Models\Hotel_info as Info;

//Authentication
Route::get('/login', function () {
    return view('login')->with('info',Info::first());
});
Route::post('/login',[userController::class,'login']);
Route::GET('/logout',[userController::class,'logout']);

//Client site
Route::get('/gallery',[webController::class,'gallery']);
Route::resource('/subscribe',subscriptionController::class);
Route::GET('/',[webController::class,'index']);
Route::GET('/rooms',[webController::class,'rooms']);
Route::GET('/room/details/{id}',[webController::class,'show']);
Route::GET('/room/bookable/details/{id}',[webController::class,'bookable']);
Route::get('/list',[roomController::class,'list']);
Route::get('/register',[customerController::class,'create']);
Route::get('/about',[webController::class,'about']);
Route::POST('/customer/register',[customerController::class,'store']);

Route::group(['middleware'=>['client']], function () {
Route::get('/customer/dashboard',[webController::class,'dashboard']);
Route::get('/customer/bookings',[customerController::class,'myBookings']);
Route::POST('/customer/booking',[reservationController::class,'store']);
Route::get('/room/reserve/{id}',[webController::class,'bookingForm']);
Route::patch('/customer/bookings/cancel/{id}',[webController::class,'cancelBooking']);
Route::patch('/customer/bookings/extension/{id}',[webController::class,'extenstionRequest']);
Route::get('/stripe/payment/start',[paymentController::class,'create']);
Route::POST('/stripe/payment',[paymentController::class,'store']);
Route::POST('/customer/bookings/{id}',[webController::class,'showReservation']);
Route::get('/customer/profile',[customerController::class,'profile']);
});

Route::group(['middleware'=>['auth:sanctum','user','prevent-back-history']], function () {
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
    Route::delete('/management/rooms/{id}',[roomController::class,'destroy']);
    Route::resource('/management/categories',categoryController::class);

    //settings and configurations
    Route::resource('/management/users/manage/permissions',permissionController::class);
    Route::resource('/management/roles',roleController::class);
    Route::PATCH('/management/users/manage/grant/permissions/{id}',[userController::class,'grantPermissions']);
    Route::PATCH('/management/users/manage/revoke/permissions/{id}',[userController::class,'revokePermissions']);
    Route::resource('/management/settings',infoController::class);
    Route::POST('/management/update/settings',[infoController::class,'update']);
    Route::post('/management/info/logo',[infoController::class,'changeLogo']);

    //bookings
    Route::resource('/management/bookings',reservationController::class);
    Route::patch('/management/reservations/cancel/{id}',[reservationController::class,'cancelBooking']);
    Route::get('/management/check-in-list',[reservationController::class,'readForCheckIn']);
    Route::get('/management/check-out-list',[reservationController::class,'readForCheckOut']);
    Route::patch('management/reservations/checkin/{id}',[reservationController::class,'checkin']);
    Route::patch('/management/reservations/checkout/{id}',[reservationController::class,'checkout']);
    Route::resource('/management/reservation/status',statusController::class);
    //customers
    Route::resource('/customers',customerController::class);
    //users
    Route::resource('/management/users',userController::class); 
    Route::get('/management/user/profile',[userController::class,'profile']);
    Route::post('/management/users/avatar/upload/{id}',[userController::class,'storeAvatar']);


//reports
    Route::get('/management/reports/financial',[reports::class,'financial']);
    Route::get('/management/reports/data/weekly',[reports::class,'weekly_data']);
    Route::get('/management/reports/data/monthly',[reports::class,'monthly_data']);
    Route::get('/management/reports/data/annual',[reports::class,'annual_data']);
  });




// //customers

// Route::resource('/customer',customerController::class);
// //rooms
// // Route::resource('/rooms',roomController::class);
// Route::resource('/room/categories',categoryController::class);
// Route::get('/room/popular',[roomController::class,'popular']);

// //hotel info

