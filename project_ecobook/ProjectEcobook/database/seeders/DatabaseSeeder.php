<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Admin;
use App\Models\Category;
use App\Models\Subcategory;

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
            'first_name' => 'Budi',
            'last_name' => 'Setiawan',
            'email' => 'budi@gmail.com',
            'password' => bcrypt('12345678')
        ]);

        Admin::create([
            'nama_admin' => 'Al Kausar',
            'email' => 'alka@gmail.com',
            'password' => bcrypt('12345678')
        ]);

        Category::create([
            'nama_category' => 'Pemrograman'
        ]);

        Category::create([
            'nama_category' => 'Bahasa'
        ]);

        Subcategory::create([
            'nama_subcategory' => 'Pemrograman Mobile',
            'id_category' => '1'
        ]);

        Subcategory::create([
            'nama_subcategory' => 'Pemrograman Website',
            'id_category' => '1'
        ]);

        Subcategory::create([
            'nama_subcategory' => 'Bahasa Indonesia',
            'id_category' => '2'
        ]);
    }
}
