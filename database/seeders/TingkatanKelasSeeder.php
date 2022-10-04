<?php

namespace Database\Seeders;

use App\Models\TingkatanKelas;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TingkatanKelasSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        TingkatanKelas::create([
        'sekolah_id' => '1',
        'tingkatan_kelas' => 'Kelas VII',
        'deskripsi' => 'kelas 7'
    ]);
        TingkatanKelas::create([
        'sekolah_id' => '1',
        'tingkatan_kelas' => 'Kelas VIII',
        'deskripsi' => 'kelas 8'
    ]);
        TingkatanKelas::create([
        'sekolah_id' => '1',
        'tingkatan_kelas' => 'Kelas IX',
        'deskripsi' => 'kelas 9'
    ]);
        TingkatanKelas::create([
        'sekolah_id' => '2',
        'tingkatan_kelas' => 'Kelas X',
        'deskripsi' => 'kelas 10'
    ]);
        TingkatanKelas::create([
        'sekolah_id' => '2',
        'tingkatan_kelas' => 'Kelas XI IPA',
        'deskripsi' => 'kelas 11'
    ]);
        TingkatanKelas::create([
        'sekolah_id' => '3',
        'tingkatan_kelas' => 'Kelas XI Perkantoran',
        'deskripsi' => 'kelas 11'
    ]);
    }
}
