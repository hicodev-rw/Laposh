<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{
    use HasFactory;
    protected $table='payments';
    protected $primaryKey='id';
    protected $fillable=['booking_id','reference','amount','payment_option'];
    public function booking(){
        return $this->belongsTo(Reservation::class);
    }
}
