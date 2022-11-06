<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Transaksi;

class TransaksiAdminController extends Controller
{
    public function transaksiUser()
    {
        return view('admin.transaksi.transaksi_user', [
            'dataT' => Transaksi::latest()->get()
        ]);
    }

    public function updateTransaksi(Request $request, $id)
    {
        $validasiData = $request->validate([
            'status' => 'max:1'
        ]);
        
        Transaksi::where('id', '=', $id)->update($validasiData);

        return redirect()->route('admin.transaksiU')->with('success', 'Update Transaksi Berhasil Dilakukan');
    }
}
