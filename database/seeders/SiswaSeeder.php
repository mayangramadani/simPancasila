<?php

namespace Database\Seeders;

use App\Models\Siswa;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class SiswaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Siswa::create([
            'kelas_id' => '2',
            'nis' => '12365344',
            'nama_siswa' => 'Budi',
            'tempat_lahir' => 'Jalan Kenangan',
            'tanggal_lahir' => '2002-02-21',
            'jenis_kelamin' => 'Laki-laki',
            'agama' => 'Islam',
            'no_hp' => '0821888888',
            'ayah' => 'Kuncoro',
            'ibu' => 'Susanti'
        ]);
        Siswa::create([
            'kelas_id' => '1',
            'nis' => '3235344',
            'nama_siswa' => 'Bambang',
            'tempat_lahir' => 'Jalan Kenangan',
            'tanggal_lahir' => '2002-02-21',
            'jenis_kelamin' => 'Laki-laki',
            'agama' => 'Hindu',
            'no_hp' => '0821888888',
            'ayah' => 'Budi',
            'ibu' => 'Astuti'
        ]);
        Siswa::create([
            'kelas_id' => '1',
            'nis' => '3235344',
            'nama_siswa' => 'Menik',
            'tempat_lahir' => 'Jalan Kenangan',
            'tanggal_lahir' => '2002-02-21',
            'jenis_kelamin' => 'Perempuan',
            'agama' => 'Islam',
            'no_hp' => '0821888888',
            'ayah' => 'Budi',
            'ibu' => 'Astuti'
        ]);
        Siswa::create([
            'kelas_id' => '1',
            'nis' => '3235344',
            'nama_siswa' => 'Santos',
            'tempat_lahir' => 'Jalan Kenangan',
            'tanggal_lahir' => '2002-02-21',
            'jenis_kelamin' => 'Laki-laki',
            'agama' => 'Hindu',
            'no_hp' => '0821888888',
            'ayah' => 'Budi',
            'ibu' => 'Astuti'
        ]);
    }
}
