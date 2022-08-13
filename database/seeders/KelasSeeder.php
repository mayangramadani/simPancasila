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
            'sekolah_id' => '1',
            'nama_kelas' => 'VII 1',
            'tingkatan_kelas' => 'Kelas 7',
            'kuota' => '40'
        ]);
        DataKelas::create([
            'sekolah_id' => '2',
            'nama_kelas' => 'X',
            'tingkatan_kelas' => 'Kelas 10',
            'kuota' => '35'
        ]);
    }
}
