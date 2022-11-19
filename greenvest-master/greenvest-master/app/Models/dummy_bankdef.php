<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class dummy_bankdef extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'bank_id',
    ];

    public function User(){
        return $this->belongsTo(User::class);
    }

    public function Bank(){
        return $this->belongsTo(Bank::class);
    }
}
