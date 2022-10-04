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
            'deskripsi' => 'Uang masuk',
            'kategori_keuangan' => 'pemasukan'
        ]);
        KategoriKeuangan::create([
            'nama_keuangan' => 'Pengeluaran',
            'deskripsi' => 'Belanja',
            'kategori_keuangan' => 'pengeluaran'
        ]);
        KategoriKeuangan::create([
            'nama_keuangan' => 'RKAS',
            'deskripsi' => 'Rencana Kerja dan Anggaran Sekolah',
            'kategori_keuangan' => 'pengeluaran'
        ]);
    }
}
