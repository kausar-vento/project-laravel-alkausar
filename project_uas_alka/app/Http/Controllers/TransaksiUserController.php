<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Transaksi;
use App\Models\Course;
use Illuminate\Support\Facades\Storage;

class TransaksiUserController extends Controller
{
    public function historyTransaksi()
    {
        $dataTransaksi = Transaksi::where('user_id', '=', auth()->user()->id);
        return view('user.transaksi.home_history', [
            'dataT' => $dataTransaksi->latest()->get()
        ]);
    }

    public function formTransaksi($id)
    {
        $dataCourse = Course::where('id', '=', $id)->first();
        return view('user.transaksi.create_transaksi', [
            'dCourse' => $dataCourse
        ]);
    }

    public function storeTransaksi(Request $request)
    {
        $validasiData = $request->validate([
            'course_id' => 'required',
            'user_id' => 'required',
            'bukti_upload' => 'required|mimes:jpg,png,jpeg|max:5048',
            'status' => 'required'
        ]);

        if ($request->file('bukti_upload')) {
            $validasiData['bukti_upload'] = $request->file('bukti_upload')->store('uploadTransaksi'); 
        }
        
        Transaksi::create($validasiData);
        return redirect('/user/history')->with('success', 'Transaksi Berhasil Dilakukan, Mohon Menunggu Konfirmasi Admin');
    }

    public function homeKelas()
    {
        $dataTransaksi = Transaksi::where('user_id', '=', auth()->user()->id)->where('status', '=', '2');
        return view('user.kelas.home_kelas', [
            'dataK' => $dataTransaksi->latest()->get()
        ]);
    }
}
