<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\NextRegister;

class NextRegisterPenjualController extends Controller
{
    public function createVerifikasi()
    {
        return view('penjual.verifikasi-penjual.index');

    }

    public function storeVerifikasi(Request $request)
    {
        
    }
}
