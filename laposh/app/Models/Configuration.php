<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Configuration extends Model
{
    protected $table='configurations';
    protected $primaryKey='id';
    protected $fillable=['name','email','address','logo'];
}
