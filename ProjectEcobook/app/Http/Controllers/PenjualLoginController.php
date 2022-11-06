<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PenjualLoginController extends Controller
{
    public function homePenjual()
    {
        return view('penjual.home');
    }

    public function loginPenjual()
    {
        return view('penjual.login');
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
}
