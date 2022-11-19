<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Buku;
use Illuminate\Support\Facades\DB;

class ProdukBukuController extends Controller
{
    public function getBuku($id)
    {
        $getDataB = Buku::where('id', '=', $id)->first();
        $bukuA = Buku::all();
        return view('user.product.get_buku', [
            'getDB' => $getDataB,
            'bukuAcak' => $bukuA->random(3)->all()
        ]);
    }

    public function productAll()
    {
        $allB = Buku::latest()->paginate(6);
        return view('user.product.all_product', [
            'allBuku' => $allB
        ]);
    }
}
