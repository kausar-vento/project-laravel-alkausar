<?php

namespace App\Http\Controllers;

use App\Models\user_image;
use App\Models\Green;
use App\Models\list_transaksi;
use App\Models\Produk_green;
use App\Models\produk_image;
use App\Models\dummy_laba;
use App\Models\googlefin_format;
use App\Models\Bank;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TransaksiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function greenbond()
    {
        $user = Auth::user();
        $user_image = user_image::where('user_id', $user->id)->first();
        $green = Green::where('id', [2])->get();
        $produk_green = Produk_green::where('green_id', [2])->orderBy('nama', 'ASC')->get();
        $image = produk_image::all();
        return view('pages.user.transaksi.green.bond.index', [
            'title' => "Transaksi | Green Bond",
            'user' => $user,
            'green' => $green,
            'produk_green' => $produk_green,
            'image' => $image,
            'user_image' => $user_image,
        ]);
    }

    public function greensukuk()
    {
        $user = Auth::user();
        $user_image = user_image::where('user_id', $user->id)->first();
        $green = Green::where('id', [3])->get();
        $produk_green = Produk_green::where('green_id', [1])->orderBy('nama', 'ASC')->get();
        $image = produk_image::all();
        return view('pages.user.transaksi.green.sukuk.index', [
            'title' => "Transaksi | Green Sukuk",
            'user' => $user,
            'green' => $green,
            'produk_green' => $produk_green,
            'image' => $image,
            'user_image' => $user_image,
        ]);
    }

    public function greentaxonomy()
    {

        $user = Auth::user();
        $user_image = user_image::where('user_id', $user->id)->first();
        $green = Green::where('id', [3])->get();
        $produk_green = Produk_green::where('green_id', [3])->orderBy('nama', 'ASC')->get();
        $image = produk_image::all();
        return view('pages.user.transaksi.green.taxonomy.index', [
            'title' => "Transaksi | Green Taxonomy",
            'user' => $user,
            'green' => $green,
            'produk_green' => $produk_green,
            'image' => $image,
            'user_image' => $user_image,
        ]);
    }

    public function listtransaksi()
    {
        $user = Auth::user();
        $user_image = user_image::where('user_id', $user->id)->first();
        $image = produk_image::all();
        $list_transaksi = list_transaksi::where('user_id', $user->id)->orderBy('created_at', 'DESC')->get();

        return view('pages.user.transaksi.list-transaksi.index', [
            'title' => "Transaksi | List Transaksi",
            'user' => $user,
            'list_transaksi' => $list_transaksi,
            'image' => $image,
            'user_image' => $user_image,
        ]);
    }

    public function store(Request $request)
    {
        $validateData = $request->validate([
            'bank_id' => 'required|numeric',
            /* 'pesan' => 'required', */
            'total_bayar' => 'required|numeric',
            'user_id' => 'required|numeric',
            'produk_green_id' => 'required|numeric',
            'jenis_transaksi' => 'required',
            'status' => 'required',
            'kode_transaksi' => 'required',
        ]);

        if ($request->pesan == "") {
            $validateData['pesan'] = "Tidak ada pesan.";
        } else {
            $validateData['pesan'] = $request->pesan;
        }

        $produk_green = produk_green::find($request->produk_green_id);
        if ($request->total_bayar < $produk_green->min_pembelian_produk) {
            return back()->withErrors(['msg1' => 'Minimal Pembelian Produk adalah Rp.' . $produk_green->min_pembelian_produk]);
        }

        $bank = Bank::find($request->bank_id);
        if ($bank->bank_name == "GreenVest") {
            if ($bank->saldo < $request->total_bayar) {
                return back()->withErrors(['msg2' => 'Saldo GreenVest Tidak Mencukupi']);
            } else {
                $bank->saldo = $bank->saldo - $request->total_bayar;
                $bank->save();

                $validateData['status'] = "Selesai";
            }
        }

        /* dd($request->all()); */
        /* dd($validateData); */

        list_transaksi::create($validateData);

        return redirect()->route('transaksi.list')
            ->with('success', 'Successfully Added');
    }

    public function transaksi_detail($id)
    {
        $user = Auth::user();
        $user_image = user_image::where('user_id', $user->id)->first();
        $this_transaksi = list_transaksi::find($id);
        $image = produk_image::where('produk_green_id', $this_transaksi->produk_green->id)->first();
        $produk_green = Produk_green::find($this_transaksi->produk_green->id);
        $dummy_laba = dummy_laba::where('produk_green_id', $produk_green->id)->first();
        $googlefin_format = googlefin_format::where('produk_green_id', $produk_green->id)->first();

        return view('pages.user.transaksi.list-transaksi.detail.index', [
            'title' => "Transaksi | List Transaksi",
            'user' => $user,
            'this_transaksi' => $this_transaksi,
            'image' => $image,
            'produk_green' => $produk_green,
            'dummy_laba' => $dummy_laba,
            'googlefin_format' => $googlefin_format,
            'user_image' => $user_image,
        ]);
    }
}
