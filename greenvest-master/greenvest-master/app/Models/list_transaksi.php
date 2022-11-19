<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class list_transaksi extends Model
{
    use HasFactory;
    protected $guarded = [];

    public function user(){
        return $this->belongsTo(user::class, 'user_id');
    }

    public function produk_green(){
        return $this->belongsTo(Produk_green::class, 'produk_green_id');
    }

    public function bank(){
        return $this->belongsTo(Bank::class, 'bank_id');
    }

    public function temp_transaction(){
        return $this->hasMany(temp_transaction::class);
    }
}
