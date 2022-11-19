<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    /* protected $fillable = [
        'name',
        'email',
        'password',
    ]; */

    protected $guarded = [];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function Bank(){
        return $this->hasMany(Bank::class);
    }

    public function dummy_bankdef(){
        return $this->hasMany(dummy_bankdef::class);
    }

    public function saldo_greenvest(){
        return $this->hasMany(saldo_greenvest::class);
    }

    public function dummy_simulasi(){
        return $this->hasMany(dummy_simulasi::class);
    }

    public function temp_transaction(){
        return $this->hasMany(temp_transaction::class);
    }

    public function user_image(){
        return $this->hasMany(user_image::class);
    }
}
