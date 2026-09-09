<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Informasi;
use App\Models\Kategori;

class InformasiSeeder extends Seeder
{
    public function run(): void
    {
        $teknologi = Kategori::where('nama', 'Teknologi')->first();
        $pendidikan = Kategori::where('nama', 'Pendidikan')->first();
        $kesehatan = Kategori::where('nama', 'Kesehatan')->first();
        $bisnis = Kategori::where('nama', 'Bisnis')->first();

        Informasi::create([
            'kategori_id' => $teknologi->id,
            'judul' => 'Perkembangan Teknologi AI',
            'ringkasan' => 'Artificial Intelligence semakin banyak digunakan dalam berbagai bidang.',
            'isi' => 'Teknologi Artificial Intelligence atau AI berkembang dengan sangat pesat dan digunakan dalam berbagai bidang seperti pendidikan, bisnis, kesehatan, dan industri.',
            'sumber' => 'Knowledge Hub',
            'status' => 'published',
        ]);

        Informasi::create([
            'kategori_id' => $pendidikan->id,
            'judul' => 'Pentingnya Literasi Digital',
            'ringkasan' => 'Literasi digital membantu masyarakat menggunakan teknologi dengan bijak.',
            'isi' => 'Literasi digital merupakan kemampuan untuk memahami, menggunakan, dan mengevaluasi informasi melalui teknologi digital secara aman dan bertanggung jawab.',
            'sumber' => 'Knowledge Hub',
            'status' => 'published',
        ]);

        Informasi::create([
            'kategori_id' => $kesehatan->id,
            'judul' => 'Menjaga Pola Hidup Sehat',
            'ringkasan' => 'Pola hidup sehat dapat membantu menjaga kondisi tubuh.',
            'isi' => 'Pola hidup sehat dapat dilakukan dengan menjaga pola makan, berolahraga secara rutin, tidur yang cukup, dan menjaga kebersihan.',
            'sumber' => 'Knowledge Hub',
            'status' => 'published',
        ]);

        Informasi::create([
            'kategori_id' => $bisnis->id,
            'judul' => 'Mengenal Bisnis Digital',
            'ringkasan' => 'Bisnis digital memanfaatkan teknologi untuk menjalankan kegiatan bisnis.',
            'isi' => 'Bisnis digital memanfaatkan internet dan teknologi digital untuk memasarkan produk, berkomunikasi dengan pelanggan, dan menjalankan operasional bisnis.',
            'sumber' => 'Knowledge Hub',
            'status' => 'draft',
        ]);
    }
}