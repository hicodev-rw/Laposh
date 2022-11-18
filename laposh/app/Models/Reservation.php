<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Reservation extends Model
{
    protected $table='bookings';
    protected $primaryKey='id';
    protected $fillable=['user_id','room_id','check_in_date','check_out_date','special_info','reference','status_id'];

    public function user(){
        return $this->belongsTo(User::class);
    }
    public function room(){
        return $this->belongsTo(Room::class);
    }
    public function status(){
        return $this->belongsTo(Status::class);
    }
    public function payment(){
        return $this->hasOne(Payment::class);
    }
}
