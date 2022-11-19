<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class charttest extends Model
{
    use HasFactory;

    protected $fillable = [
        'produk_green_id',
        'jan',
        'feb',
        'mar',
        'apr',
        'may',
        'jun',
        'jul',
        'aug',
        'sep',
        'oct',
        'nov',
        'dec',
        'year',
    ];

    public function produk_green()
    {
        return $this->belongsTo(Produk_green::class);
    }
}
