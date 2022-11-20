<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Buku;
use App\Models\Category;
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
        $allB = Buku::latest();
        $cate = request('cate');
        if (request('search')) {
            $allB->where('nama_buku', 'like', '%' .request('search') . '%');
        } elseif (request('cate')) {
            $allB->where('id_category', '=', $cate);
        }
        return view('user.product.all_product', [
            'allBuku' => $allB->paginate(6),
            'allCate' => Category::all()
        ]);
    }

    public function test()
    {
        return view('user.keranjang.index_keranjang');
    }
}
