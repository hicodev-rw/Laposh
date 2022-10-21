<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Reservation extends Model
{
    protected $table='bookingd';
    protected $primaryKey='id';
    protected $fillable=['checkInDate','checkOutDate','special_info','reference','status'];
}
