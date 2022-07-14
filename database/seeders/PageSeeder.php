<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('pages')->insert([
            [
                'name' => 'Beranda',
                'slug' => 'beranda',
                'content' => 'ini adalah auto generated konten untuk beranda ubah konten ini dihalaman admin'
            ],
            [
                'name' => 'Tentang',
                'slug' => 'tentang',
                'content' => 'ini adalah auto generated konten untuk tentang ubah konten ini dihalaman admin'
            ]
        ]);
    }
}
