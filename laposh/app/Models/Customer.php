<?php
namespace App\Models;
// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class Customer extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    protected $table='customers';
    protected $primaryKey='id';
    protected $fillable=['firstName','lastName','email','password','title','avatar','DoB'];
    public function reservations(){
        return $this->hasMany(Reservation::class);
    }

    protected $hidden = [
        'password',
        'remember_token',
    ];

}
