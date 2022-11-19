<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\user_image;
use App\Models\Bank;
use App\Models\dummy_bankdef;
use App\Models\dummy_laba;
use App\Models\Green;
use App\Models\list_transaksi;
use App\Models\Produk_green;
use App\Models\produk_image;
use App\Models\charttest;
use App\Models\google_finance;
use App\Models\googlefin_format;
use App\Models\temp_transaction;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();

        User::create([
            'nama_lengkap' => 'GV Admin',
            'username' => 'admin',
            'nohp' => '081212121212',
            'email' => 'matahariku@gmail.com',
            'level' => 'Admin',
            'password' => bcrypt('matahariku'),
        ]);

        User::create([
            'nama_lengkap' => 'Muhamad Alif Rizki',
            'username' => 'fantasiavsr',
            'nohp' => '082222222222',
            'email' => 'fantasiavsr@gmail.com',
            'level' => 'User',
            'password' => bcrypt('matahariku'),
        ]);

        Bank::create([
            'user_id' => 2,
            'bank_name' => 'GreenVest',
            'no_rekening' => '081123123123',
            'saldo' => 16665000,
        ]);

        Green::create([
            'id' => 1,
            'nama' => 'Green Sukuk',
            'min_pembelian' => 1000000,
        ]);

        Green::create([
            'id' => 2,
            'nama' => 'Green Bond',
            'min_pembelian' => 5000000,
        ]);

        Green::create([
            'id' => 3,
            'nama' => 'Green Taxonomy',
            'min_pembelian' => 0,
        ]);
    }
}
