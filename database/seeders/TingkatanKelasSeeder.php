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
        'tingkatan_kelas' => 'Kelas IX',
        'deskripsi' => 'kelas 9'
    ]);
    }
}
