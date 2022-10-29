<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Reservation extends Model
{
    protected $table='bookings';
    protected $primaryKey='id';
    protected $fillable=['customer_id','room_id','check_in_date','check_out_date','special_info','reference','status_id'];

    public function customer(){
        return $this->belongsTo(Customer::class);
    }
    public function room(){
        return $this->belongsTo(Room::class);
    }
    public function status(){
        return $this->belongsTo(Status::class);
    }
}
