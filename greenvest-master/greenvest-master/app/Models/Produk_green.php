<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Produk_green extends Model
{
    use HasFactory;
    protected $guarded = [];
    /* protected $fillable = [
        'nama',
        'perusahaan',
        'green_id',
        'jenis_produk',
        'kategori',
        'tingkat_risiko',
        'year_return',
        'pre_close',
        'jatuh_tempo',
        'min_pembelian_produk',
        'biaya_pembelian',
        'biaya_penjualan',
        'biaya_penampung',
    ]; */

    public function green(){
        return $this->belongsTo(Green::class, 'green_id');
    }

    public function charttest(){
        return $this->hasMany(charttest::class, 'produk_green_id');
    }

    public function produk_image(){
        return $this->hasMany(produk_image::class, 'produk_green_id');
    }

    public function dummy_laba(){
        return $this->hasMany(dummy_laba::class, 'produk_green_id');
    }

    public function google_finance(){
        return $this->hasMany(google_finance::class, 'produk_green_id');
    }

    public function dummy_simulasi(){
        return $this->hasMany(dummy_simulasi::class, 'produk_green_id');
    }

    public function googlefin_format(){
        return $this->hasMany(googlefin_format::class, 'produk_green_id');
    }
}
