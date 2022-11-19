<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Buku;
use App\Models\Penjual;
use Illuminate\Support\Facades\Auth;

class PenjualLoginController extends Controller
{
    public function homePenjual()
    {
        $countBk = Buku::where('id_penjual', '=', auth()->guard('webpenjual')->user()->id)->get()->count();
        return view('penjual.home', [
            "hitungBk" => $countBk
        ]);
    }

    public function loginPenjual()
    {
        return view('penjual.login');
    }

    public function registerPenjual()
    {
        return view('penjual.register');
    }

    public function prosesLoginPenjual(Request $request)
    {
        $validasi = $request->validate([
            'email' => 'required|email:dns',
            'password' => 'required|min:8'
        ]);

        if (Auth::guard('webpenjual')->attempt($validasi)) {
            $request->session()->regenerate();
            return redirect()->route('penjual.indexPenjual');
        }   
        return back()->with('gagalLogin', 'Anda Gagal Melakukan Login ');
    }

    public function logoutPenjual()
    {
        Auth::guard('webpenjual')->logout();
        return redirect()->route('penjual.loginPenjual');
    }

    public function registerP(Request $request)
    {
        $pw = $request->input('password');
        $validasi = $request->validate([
            'first_name' => 'required',
            'last_name' => 'required',
            'nama_toko' => 'required',
            'email' => 'required',
            'password' => 'required'
        ]);
        $validasi['password'] = bcrypt($pw);

        Penjual::create($validasi);
        return redirect()->route('penjual.loginPenjual')->with('success', 'Register Penjual Berhasil Dilakukan');        
    }
}
