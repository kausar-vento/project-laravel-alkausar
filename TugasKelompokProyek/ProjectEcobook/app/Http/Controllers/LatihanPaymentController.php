<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;


class LatihanPaymentController extends Controller
{
    public function indexForm(Request $request)
    {
        return view('latihan_form');
    }

    public function index(Request $request)
    {
        // Set your Merchant Server Key
        \Midtrans\Config::$serverKey = 'SB-Mid-server-m7KihEoPxTgwUf4ZGszBqix4';
        // Set to Development/Sandbox Environment (default). Set to true for Production Environment (accept real transaction).
        \Midtrans\Config::$isProduction = false;
        // Set sanitization on (default)
        \Midtrans\Config::$isSanitized = true;
        // Set 3DS transaction for credit card to true
        \Midtrans\Config::$is3ds = true;
        
        $params = array(
            'transaction_details' => array(
                'order_id' => rand(),
                'gross_amount' => 22000,
            ),
            'item_details' => array(
                [
                    'id' => 'a1',
                    'price' => '10000',
                    'quantity' => 1,
                    'name' => 'Apel'   
                ],
                [
                    'id' => 'a2',
                    'price' => '12000',
                    'quantity' => 1,
                    'name' => 'Ikan'   
                ]
            ),
            'customer_details' => array(
                'first_name' => $request->get('uname'),
                'last_name' => '',
                'email' => $request->get('email'),
                'phone' => $request->get('number'),
            ),
        );
        
        $snapToken = \Midtrans\Snap::getSnapToken($params);

        return view('latihan', [
            'snap_token' => $snapToken
        ]);
    }

    public function indexPost(Request $request)
    {
        return $request;
    }

    public function testAgain()
    {
        $cate = Category::all();
        return view('test_lagi', [
            'dataC' => $cate
        ]);
    }

}
