<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    protected $table='roles';
    protected $primaryKey='id';
    protected $fillable=['name','permission_id'];

    public function permission(){
        return $this->belongsTo(Permission::class);
    }
    public function users(){
        return $this->hasMany(User::class);
    }
}
