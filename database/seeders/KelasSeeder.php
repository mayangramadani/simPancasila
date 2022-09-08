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
            'nama_kelas' => 'VII 1',
            'kuota' => '40'
        ]);
        DataKelas::create([
            'tingkatan_kelas_id' => '2',
            'nama_kelas' => 'X',
            'kuota' => '35'
        ]);
        DataKelas::create([
            'tingkatan_kelas_id' => '3',
            'nama_kelas' => 'XI',
            'kuota' => '39'
        ]);
    }
}
