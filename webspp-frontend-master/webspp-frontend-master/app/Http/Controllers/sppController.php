<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class sppController extends Controller
{
    public function index()
    {
        return view('spp', [
            'title' => 'spp'
        ]);
    }
}
