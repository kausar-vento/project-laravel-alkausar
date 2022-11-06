<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminLoginController extends Controller
{
    public function home()
    {
        return view('admin.home_admin');
    }

    public function index()
    {
        return view('admin.login_admin');
    }

    public function store(Request $request)
    {
        $validasi = $request->validate([
            'email' => 'required|email:dns',
            'password' => 'required|min:8'
        ]);

        if (Auth::guard('webadmin')->attempt($validasi)) {
            $request->session()->regenerate();
            return redirect()->route('admin.homeAdmin');
        }   
        return back()->with('gagalLogin', 'Anda Gagal Melakukan Login ');
    }

    public function logoutAdmin(Request $request)
    {
        Auth::guard('webadmin')->logout();
        return redirect()->route('login-admin');
    }
}
