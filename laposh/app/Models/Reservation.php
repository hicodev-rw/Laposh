<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Reservation extends Model
{
    protected $table='bookings';
    protected $primaryKey='id';
    protected $fillable=['checkInDate','checkOutDate','special_info','reference','status'];

    public function customer(){
        return $this->belongsTo(Customer::class);
    }
    public function room(){
        return $this->belongsTo(Room::class);
    }
}
