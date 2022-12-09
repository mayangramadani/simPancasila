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
            'users_id' => '1',
            'no_transaksi' => '12345678',
            'nama_keuangan' => 'Bayar SPP',
            'jumlah' => '100000',
            'deskripsi' => 'asad',
            'tanggal' => '2022-07-22 11:13:24.000000',
            'bukti' => 'Foto_074406.jpg',
            'status_pembayaran' => 'Proses'
        ]);
        Keuangan::create([
            'kategori_keuangan_id' => '1',
            'users_id' => '3',
            'no_transaksi' => '99887766',
            'nama_keuangan' => 'Bayar SPP',
            'jumlah' => '150000',
            'deskripsi' => 'uhuhuh',
            'tanggal' => '2022-07-22 11:13:24.000000',
            'bukti' => 'Foto_074406.jpg',
            'status_pembayaran' => 'Proses'
        ]);
        Keuangan::create([
            'kategori_keuangan_id' => '2',
            'users_id' => '1',
            'no_transaksi' => '5544332211',
            'nama_keuangan' => 'Beli Komputer',
            'jumlah' => '12000',
            'deskripsi' => 'hehehhe',
            'tanggal' => '2022-07-22 11:13:24.000000',
            'bukti' => 'Foto_074406.jpg',
            'status_pembayaran' => 'Proses'
        ]);

    }
}
