<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Kategori;

class KategoriSeeder extends Seeder
{
    public function run(): void
    {
        Kategori::create([
            'nama' => 'Teknologi',
        ]);

        Kategori::create([
            'nama' => 'Pendidikan',
        ]);

        Kategori::create([
            'nama' => 'Kesehatan',
        ]);

        Kategori::create([
            'nama' => 'Bisnis',
        ]);
    }
}