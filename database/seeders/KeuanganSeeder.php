<?php

namespace Database\Seeders;

use App\Models\Keuangan;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class KeuanganSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Keuangan::create([
            'kategori_keuangan_id' => '1',
            'users_id' => '2',
            'nama_keuangan' => 'Bayar SPP',
            'jumlah' => '100000',
            'deskripsi' => 'asad',
            'tanggal' => '2022-07-22 11:13:24.000000',
            'bukti' => '',
            'status_pembayaran' => 'Proses'
        ]);
        Keuangan::create([
            'kategori_keuangan_id' => '1',
            'users_id' => '3',
            'nama_keuangan' => 'Bayar SPP',
            'jumlah' => '150000',
            'deskripsi' => 'uhuhuh',
            'tanggal' => '2022-07-22 11:13:24.000000',
            'bukti' => '',
            'status_pembayaran' => 'Proses'
        ]);
        Keuangan::create([
            'kategori_keuangan_id' => '2',
            'users_id' => '2',
            'nama_keuangan' => 'Beli Komputer',
            'jumlah' => '12000',
            'deskripsi' => 'hehehhe',
            'tanggal' => '2022-07-22 11:13:24.000000',
            'bukti' => '',
            'status_pembayaran' => 'Proses'
        ]);

    }
}
