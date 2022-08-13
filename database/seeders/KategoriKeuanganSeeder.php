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
            'deskripsi' => 'Pemasukan',
            'kategori_keuangan' => 'pemasukan'
        ]);
        KategoriKeuangan::create([
            'nama_keuangan' => 'Sarana dan Prasarana',
            'deskripsi' => 'Pengeluaran',
            'kategori_keuangan' => 'pengeluaran'
        ]);
    }
}
