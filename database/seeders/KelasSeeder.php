<?php

namespace Database\Seeders;

use App\Models\DataKelas;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class KelasSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DataKelas::create([
            'tingkatan_kelas_id' => '1',
            'nama_kelas' => 'Kelas VII.1',
            'kuota' => '40'
        ]);
        DataKelas::create([
            'tingkatan_kelas_id' => '4',
            'nama_kelas' => 'Kelas X Ipa',
            'kuota' => '35'
        ]);
        DataKelas::create([
            'tingkatan_kelas_id' => '4',
            'nama_kelas' => 'Kelas XI Ipa',
            'kuota' => '32'
        ]);
        DataKelas::create([
            'tingkatan_kelas_id' => '5',
            'nama_kelas' => 'Kelas XI Ipa',
            'kuota' => '32'
        ]);
        DataKelas::create([
            'tingkatan_kelas_id' => '6',
            'nama_kelas' => 'Kelas XI.TKJ',
            'kuota' => '39'
        ]);
    }
}
