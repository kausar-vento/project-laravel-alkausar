<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class data_diriController extends Controller
{
    public function index()
    {
        return view('data_diri', [
            'title' => 'data_diri'
        ]);
    }
}
