<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class googlefin_format extends Model
{
    use HasFactory;

    protected $fillable = [
        'produk_green_id',
        'pre_close',
        'market_cap',
        'div_yield',
    ];

    public function produk_green()
    {
        return $this->belongsTo(Produk_green::class);
    }
}
