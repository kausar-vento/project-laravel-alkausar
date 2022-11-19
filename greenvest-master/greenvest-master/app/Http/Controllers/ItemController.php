<?php

namespace App\Http\Controllers;

use App\Models\user_image;
use App\Models\Bank;
use App\Models\Produk_green;
use App\Models\charttest;
use App\Models\google_finance;
use App\Models\dummy_simulasi;
use App\Models\dummy_laba;
use App\Models\googlefin_format;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ItemController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function indextest()
    {
        $user = Auth::user();
        return view('pages.item.indextest', [
            'title' => "Item Detail",
            'user' => $user,
        ]);
    }

    public function index($id)
    {
        $user = Auth::user();
        $user_image = user_image::where('user_id', $user->id)->first();
        $produk_green = Produk_green::where('id', $id)->first();
        $google_finance = google_finance::where('produk_green_id', $id)->first();
        $googlefin_format = googlefin_format::where('produk_green_id', $id)->first();

        /* Google Finance API */
        if (isset($google_finance)) {
            $curl = curl_init();

            curl_setopt_array($curl, [
                CURLOPT_URL => 'https://google-finance4.p.rapidapi.com/ticker/?t=' . $google_finance->ticker,
                CURLOPT_RETURNTRANSFER => true,
                CURLOPT_FOLLOWLOCATION => true,
                CURLOPT_ENCODING => '',
                CURLOPT_MAXREDIRS => 10,
                CURLOPT_TIMEOUT => 30,
                CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
                CURLOPT_CUSTOMREQUEST => 'GET',
                CURLOPT_HTTPHEADER => ['X-RapidAPI-Host: google-finance4.p.rapidapi.com', 'X-RapidAPI-Key: 1df20e6770msh83a29817c29639cp167a2djsn6b0821802305'],
            ]);

            $response = curl_exec($curl);
            $err = curl_error($curl);

            curl_close($curl);

            if($err){
                $charts = null;
            }else{
                $charts = json_decode($response, true);
            }
        }else{
            $charts = null;
        }

        $charttest = charttest::where('produk_green_id', $id)->orderBy('year', 'desc')->first();

        /* Switch Requirements */
        $switch = Produk_green::where('perusahaan', $produk_green->perusahaan)
            ->where('id', '!=', $produk_green->id)
            ->get();

        return view('pages.item.index', [
            'title' => "Item Detail",
            'user' => $user,
            'produk_green' => $produk_green,
            'switch' => $switch,
            'charttest' => $charttest,
            'charts' => $charts,
            'googlefin_format' => $googlefin_format,
            'user_image' => $user_image,
        ]);
    }

    public function simulasitest()
    {
        $user = Auth::user();
        $user_image = user_image::where('user_id', $user->id)->first();
        return view('pages.item.simulasi.indextest', [
            'title' => "Simulasi",
            'user' => $user,
            'user_image' => $user_image,
        ]);
    }

    public function simulasi($id)
    {
        $user = Auth::user();
        $user_image = user_image::where('user_id', $user->id)->first();
        $dummy_simulasi = dummy_simulasi::where('user_id', $user->id)->first();
        $produk_green = Produk_green::where('id', $id)->first();
        $dummy_laba = dummy_laba::where('produk_green_id', $produk_green->id)->first();
        if (isset($dummy_simulasi) && isset($dummy_laba)) {
            $nilai = $dummy_simulasi->jumInves+($dummy_simulasi->jumInves*($dummy_laba->laba/100));
        }else{
            $nilai = 0;
        }

        return view('pages.item.simulasi.index', [
            'title' => "Simulasi",
            'user' => $user,
            'dummy_simulasi' => $dummy_simulasi,
            'produk_green' => $produk_green,
            'dummy_laba' => $dummy_laba,
            'nilai' => $nilai,
            'user_image' => $user_image,
        ]);
    }

    public function dummy_simulasi(Request $request){
        $request->validate([
            'jumInves' => 'required|numeric',
        ]);

        $user = Auth::user();
        $dummy_simulasi = dummy_simulasi::where('user_id', $user->id)->first();
        if (isset($dummy_simulasi)) {
            $dummy_simulasi->jumInves = $request->jumInves;
            $dummy_simulasi->produk_green_id = $request->produk_green_id;
            $dummy_simulasi->save();
        }else{
            $dummy_simulasi = new dummy_simulasi;
            $dummy_simulasi->user_id = $user->id;
            $dummy_simulasi->jumInves = $request->jumInves;
            $dummy_simulasi->produk_green_id = $request->produk_green_id;
            $dummy_simulasi->save();
        }
        return redirect()->route('item.simulasi', ['id' => $request->produk_green_id]);
    }

    public function bandingtest($id)
    {
        $user = Auth::user();
        $user_image = user_image::where('user_id', $user->id)->first();
        $produk_green = Produk_green::where('id', $id)->first();
        return view('pages.item.perbandingan.indextest', [
            'title' => "Perbandingan",
            'user' => $user,
            'user_image' => $user_image,
            'produk_green' => $produk_green,
        ]);
    }

    public function belitest()
    {
        $user = Auth::user();
        $user_image = user_image::where('user_id', $user->id)->first();
        $bank = Bank::where('user_id', $user->id)->get();
        return view('pages.item.beli.indextest', [
            'title' => "Beli",
            'user' => $user,
            'bank' => $bank,
            'user_image' => $user_image,
        ]);
    }

    public function beli($id)
    {
        $user = Auth::user();
        $user_image = user_image::where('user_id', $user->id)->first();
        $bank = Bank::where('user_id', $user->id)->whereNotIn('bank_name', ["LinkAja", "GoPay", "GreenVest",])->get();
        $ewallet = Bank::where('user_id', $user->id)->whereIn('bank_name', ["LinkAja", "GoPay",])->get();
        $metodebayar = Bank::where('user_id', $user->id)->whereNotIn('bank_name', ["GreenVest",])->get();
        $greenvest = Bank::where('user_id', $user->id)->where('bank_name', "GreenVest")->first();

        $produk_green = Produk_green::where('id', $id)->first();
        return view('pages.item.beli.index', [
            'title' => "Beli",
            'user' => $user,
            'bank' => $bank,
            'ewallet' => $ewallet,
            'metodebayar' => $metodebayar,
            'produk_green' => $produk_green,
            'greenvest' => $greenvest,
            'user_image' => $user_image,
        ]);
    }
}
