<?php

namespace Database\Seeders;

use App\Models\Sekolah;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SekolahSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Sekolah::create([
            'nama_sekolah' => 'SMPS Sinar Pancasila',
            'derajat' => 'SMP',
            'lokasi' => 'Jl. Telaga Sari No.13, RT.31, Telaga Sari, Kec. Balikpapan Kota, Kota Balikpapan, Kalimantan Timur 76112',
            'spp' => '150000'
        ]);
        Sekolah::create([
            'nama_sekolah' => 'SMAS Sinar Pancasila',
            'derajat' => 'SMA',
            'lokasi' => 'Jl. Telaga Sari No.13, RT.31, Telaga Sari, Kec. Balikpapan Kota, Kota Balikpapan, Kalimantan Timur 76112',
            'spp' => '200000'
        ]);
        Sekolah::create([
            'nama_sekolah' => 'SMKS Sinar Pancasila',
            'derajat' => 'SMK',
            'lokasi' => 'Jl. Telaga Sari No.13, RT.31, Telaga Sari, Kec. Balikpapan Kota, Kota Balikpapan, Kalimantan Timur 76112',
            'spp' => '200000'

        ]);
    }
}
