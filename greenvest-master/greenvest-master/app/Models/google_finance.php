<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class google_finance extends Model
{
    use HasFactory;

    protected $fillable = [
        'produk_green_id',
        'ticker',
    ];

    public function produk_green()
    {
        return $this->belongsTo(Produk_green::class);
    }
}
