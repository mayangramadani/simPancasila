<?php

namespace Database\Seeders;

use App\Models\KategoriPembayaran;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class KategoriPembayaranSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        KategoriPembayaran::create([
            'nama_pembayaran' => 'SPP',
            'deskripsi_pembayaran' => 'pembayaran SPP Siswa',
            'harga' => '150000'
        ]);
    }
}
