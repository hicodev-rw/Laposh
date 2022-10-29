<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Room extends Model
{
    protected $table='rooms';
    protected $primaryKey='id';
    protected $fillable=['name','category_id','price','specifications','images'];
    protected $casts=['images'=>'array'];

    public function category(){
        return $this->belongsTo(Category::class);
    }
    public function reservation(){
        return $this->hasMany(Reservation::class);
    }
}
