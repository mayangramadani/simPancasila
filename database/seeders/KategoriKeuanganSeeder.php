<?php

namespace Database\Seeders;

use App\Models\KategoriKeuangan;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class KategoriKeuanganSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        KategoriKeuangan::create([
            'nama_keuangan' => 'SPP',
            'deskripsi' => 'beli lepii',
            'kategori_keuangan' => 'pemasukan'
        ]);
    }
}
