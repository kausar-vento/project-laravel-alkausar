<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Green extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function produk_green(){
        return $this->hasMany(Produk_green::class);
    }
}
