<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Hotel_info extends Model
{
    protected $table='hotel-info';
    protected $primaryKey='id';
    protected $fillable=['name','email','address','about-us','phone','logo'];
}
