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
            'nama_kelas' => 'VII A',
            'tingkatan_kelas' => 'Kelas 7',
            'kuota' => '40'
        ]);
        DataKelas::create([
            'sekolah_id' => '1',
            'nama_kelas' => 'VIII B',
            'tingkatan_kelas' => 'Kelas 8',
            'kuota' => '40'
        ]);
    }
}
