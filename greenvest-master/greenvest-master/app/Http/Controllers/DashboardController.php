<?php

namespace App\Http\Controllers;

use App\Models\user_image;
use App\Models\Bank;
use App\Models\dummy_bankdef;
use App\Models\list_transaksi;
use App\Models\produk_image;
use App\Models\dummy_laba;
use App\Models\googlefin_format;

use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function index()
    {
        /* dd(Auth::user()); */
        $user = Auth::user();
        $user_image = user_image::where('user_id', $user->id)->first();
        /* $saldo = Saldo_saya::where('user_id', $user->id)->first(); */
        $bank = Bank::where('user_id', $user->id)->get();
        $bank_default = Bank::where('user_id', $user->id)->first();
        /* dd($level); */
        return view('pages.user.index', [
            'title' => "Dashboard",
            'user' => $user,
            'bankdef' => $bank_default,
            'bank' => $bank,
            'submenu' => "no",
            'user_image' => $user_image,
        ]);
    }

    public function dashboard_saldo()
    {
        $user = Auth::user();
        $user_image = user_image::where('user_id', $user->id)->first();
        $greenvest = Bank::where('user_id', $user->id)->where('bank_name', "GreenVest")->first();
        $bank = Bank::where('user_id', $user->id)->get();
        $bank_default = dummy_bankdef::where('user_id', $user->id)->first();

        $image = produk_image::all();
        $list_transaksi = list_transaksi::where('user_id', $user->id)->orderBy('created_at', 'DESC')->get();

        $portofolio = list_transaksi::where('user_id', $user->id)->where('jenis_transaksi', 'Pembelian')->where('status', 'Selesai')->orderBy('created_at', 'DESC')->get();
        $dummy_laba = dummy_laba::all();

        $googlefin_format = googlefin_format::all();
        return view('pages.user.next.saldo', [
            'title' => "Dashboard",
            'user' => $user,
            'greenvest' => $greenvest,
            'bankdef' => $bank_default,
            'bank' => $bank,
            'submenu' => "no",
            'image' => $image,
            'list_transaksi' => $list_transaksi,
            'portofolio' => $portofolio,
            'dummy_laba' => $dummy_laba,
            'googlefin_format' => $googlefin_format,
            'user_image' => $user_image,
        ]);
    }

    public function dashboard_total_bayar()
    {
        $user = Auth::user();
        $user_image = user_image::where('user_id', $user->id)->first();
        $greenvest = Bank::where('user_id', $user->id)->where('bank_name', "GreenVest")->first();
        $bank = Bank::where('user_id', $user->id)->get();
        $bank_default = dummy_bankdef::where('user_id', $user->id)->first();

        $image = produk_image::all();
        $list_transaksi = list_transaksi::where('user_id', $user->id)->orderBy('created_at', 'DESC')->get();

        $portofolio = list_transaksi::where('user_id', $user->id)->where('jenis_transaksi', 'Pembelian')->where('status', 'Selesai')->orderBy('created_at', 'DESC')->get();
        $dummy_laba = dummy_laba::all();

        $googlefin_format = googlefin_format::all();
        return view('pages.user.next.total_bayar', [
            'title' => "Dashboard",
            'user' => $user,
            'greenvest' => $greenvest,
            'bankdef' => $bank_default,
            'bank' => $bank,
            'submenu' => "no",
            'image' => $image,
            'list_transaksi' => $list_transaksi,
            'portofolio' => $portofolio,
            'dummy_laba' => $dummy_laba,
            'googlefin_format' => $googlefin_format,
            'user_image' => $user_image,
        ]);
    }

    public function dashboard_keuntungan()
    {
        $user = Auth::user();
        $user_image = user_image::where('user_id', $user->id)->first();
        $greenvest = Bank::where('user_id', $user->id)->where('bank_name', "GreenVest")->first();
        $bank = Bank::where('user_id', $user->id)->get();
        $bank_default = dummy_bankdef::where('user_id', $user->id)->first();

        $image = produk_image::all();
        $list_transaksi = list_transaksi::where('user_id', $user->id)->orderBy('created_at', 'DESC')->get();

        $portofolio = list_transaksi::where('user_id', $user->id)->where('jenis_transaksi', 'Pembelian')->where('status', 'Selesai')->orderBy('created_at', 'DESC')->get();
        $dummy_laba = dummy_laba::all();

        $googlefin_format = googlefin_format::all();
        return view('pages.user.next.keuntungan', [
            'title' => "Dashboard",
            'user' => $user,
            'greenvest' => $greenvest,
            'bankdef' => $bank_default,
            'bank' => $bank,
            'submenu' => "no",
            'image' => $image,
            'list_transaksi' => $list_transaksi,
            'portofolio' => $portofolio,
            'dummy_laba' => $dummy_laba,
            'googlefin_format' => $googlefin_format,
            'user_image' => $user_image,
        ]);
    }
}
