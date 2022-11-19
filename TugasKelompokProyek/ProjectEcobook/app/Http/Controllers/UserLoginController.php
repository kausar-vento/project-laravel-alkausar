<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\Buku;

class UserLoginController extends Controller
{
    public function home()
    {
        if (auth()->user()->level == 2) {
            return view('user.home_user', [
                'dataB' => Buku::latest()->limit(3)->get()
            ]);   
        }
        elseif(auth()->user()->level == 3){
            Auth::logout();
            return redirect()->route('login-user')->with('error', 'Akun Anda Di Nonaktifkan Admin');
        }
        else{
            Auth::logout();
            return redirect()->route('login-user');
        }
    }

    public function index()
    {
        return view('user.login_user');
    }

    public function store(Request $request)
    {
        $validasi = $request->validate([
            'email' => 'required|email:dns',
            'password' => 'required|min:8'
        ]);

        if (Auth::attempt($validasi)) {
            $request->session()->regenerate();

            return redirect()->intended('/home/user');
        }   
        return back()->with('gagalLogin', 'Anda Gagal Melakukan Login ');
    }

    public function logoutUser(Request $request)
    {
        Auth::logout();
        return redirect()->route('login-user');
    }

    public function homeRegister()
    {
        return view('user.register_user');
    }

    public function prosesRegister(Request $request)
    {
        $validasiData = $request->validate([
            'first_name' => 'required',
            'last_name' => 'required',
            'email' => 'required|email:dns',
            'password' => 'required|min:8',
        ]);
        $validasiData['password'] = bcrypt($validasiData['password']);
        User::create($validasiData);
        return redirect()->route('login-user')->with('success', 'Anda Berhasil Membuat Akun, Mohon Menunggu Admin Verivikasi');
    }

    public function aboutUser()
    {
        return view('user.about_user');
    }
}
