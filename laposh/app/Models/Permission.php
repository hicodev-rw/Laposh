<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Permission extends Model
{
    protected $table='permissions';
    protected $primaryKey='id';
    protected $fillable=['allowed','name'];
    public function role(){
        return $this->hasMany(Role::class);
    }
}
