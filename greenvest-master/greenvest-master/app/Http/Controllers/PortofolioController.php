<?php

namespace App\Http\Controllers;

use App\Models\user_image;
use App\Models\dummy_laba;
use App\Models\list_transaksi;
use App\Models\Produk_green;
use App\Models\produk_image;
use App\Models\googlefin_format;
use App\Models\temp_transaction;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PortofolioController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = Auth::user();
        $user_image = user_image::where('user_id', $user->id)->first();
        $image = produk_image::all();
        $list_transaksi = list_transaksi::where('user_id', $user->id)->where('jenis_transaksi', 'Pembelian')->where('status', 'Selesai')->orderBy('created_at', 'DESC')->get();

        $dummy_laba = dummy_laba::all();

        /* dd($list_transaksi); */
        return view('pages.user.portofolio.index', [
            'title' => "Portofolio",
            'user' => $user,
            'image' => $image,
            'list_transaksi' => $list_transaksi,
            'dummy_laba' => $dummy_laba,
            'user_image' => $user_image,
        ]);
    }

    public function portofolio_detail($id)
    {
        $user = Auth::user();
        $user_image = user_image::where('user_id', $user->id)->first();
        $this_transaksi = list_transaksi::find($id);

        $produk_green = Produk_green::where('id', $this_transaksi->produk_green_id)->first();
        $googlefin_format = googlefin_format::where('produk_green_id', $produk_green->id)->first();

        $dummy_laba = dummy_laba::where('produk_green_id', $produk_green->id)->first();
        $image = produk_image::where('produk_green_id', $produk_green->id)->first();
        return view('pages.user.portofolio.detail.index', [
            'title' => "Portofolio",
            'user' => $user,
            'this_transaksi' => $this_transaksi,
            'produk_green' => $produk_green,
            'googlefin_format' => $googlefin_format,
            'dummy_laba' => $dummy_laba,
            'image' => $image,
            'user_image' => $user_image,
        ]);
    }

    public function portofolio_jual(Request $request)
    {
        /* dd($request->all()); */
        $validateData = $request->validate([
            'user_id' => 'required|numeric',
            'produk_green_id' => 'required|numeric',
            'bank_id' => 'required|numeric',
            /* 'pesan' => 'required', */
            'total_bayar' => 'required|numeric',
            'jenis_transaksi' => 'required',
            'status' => 'required',
            'kode_transaksi' => 'required',
        ]);

        if ($request->pesan == "") {
            $validateData['pesan'] = "Tidak ada pesan.";
        } else {
            $validateData['pesan'] = $request->pesan;
        }

        $newid = list_transaksi::create($validateData);

        $temp_transaction = new temp_transaction;
        $temp_transaction->user_id = $request->user_id;
        $temp_transaction->list_transaksi_id = $newid->id;
        $temp_transaction->old_transaksi_id = $request->old_transaksi_id;

        $temp_transaction->save();

        return redirect()->route('transaksi.list')
            ->with('success', 'Successfully Added');
    }
}
