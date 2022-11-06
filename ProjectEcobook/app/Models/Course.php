<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    use HasFactory;
    
    protected $guarded = ['id'];

    public function subcategory()
    {
        return $this->belongsTo('App\Models\Subcategory', 'id_subcategory');
    }

    public function admin()
    {
        return $this->belongsTo('App\Models\Admin', 'id_admin');
    }

    public function matericourse()
    {
        return $this->hasMany(Matericourse::class);
    }

    public function transaksi()
    {
        return $this->hasMany(Transaksi::class);
    }
}
