<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Permission extends Model
{
    protected $table='permissions';
    protected $primaryKey='id';
    protected $fillable=['allowed','name'];
    protected $casts=['allowed'=>'array'];
    
    public function role(){
        return $this->hasMany(Role::class);
    }
}
