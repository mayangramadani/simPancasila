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
            'nama_keuangan' => 'Pemasukan',
            'deskripsi' => 'Pemasukan',
            'kategori_keuangan' => 'pemasukan'
        ]);
        KategoriKeuangan::create([
            'nama_keuangan' => 'Pengeluaran',
            'deskripsi' => 'Pengeluaran',
            'kategori_keuangan' => 'pengeluaran'
        ]);
    }
}
