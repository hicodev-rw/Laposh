<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class User extends Model
{
    protected $table='users';
    protected $primaryKey='id';
    protected $fillable=['firstName','lastName','email','password','avatar','role_id'];

    public function role(){
        return $this->belongsTo(Role::class);
    }
}
