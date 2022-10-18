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
            'nis' => '12365344',
            'nama_siswa' => 'Budi',
            'tempat_lahir' => 'Jalan Kenangan',
            'tanggal_lahir' => '2002-02-21',
            'jenis_kelamin' => 'Laki-laki',
            'agama' => 'Islam',
            'alamat' => 'Jalan Soekarno Hatta',
            'no_hp' => '0821888888',
            'ayah' => 'Kuncoro',
            'ibu' => 'Susanti',
            'sekolah_id' => '1',
            'users_id' => '5',
            'isActive' => '0'
        ]);
        Siswa::create([
            'nis' => '3235344',
            'nama_siswa' => 'Bambang',
            'tempat_lahir' => 'Jalan Kenangan',
            'tanggal_lahir' => '2002-02-21',
            'jenis_kelamin' => 'Laki-laki',
            'agama' => 'Hindu',
            'alamat' => 'Jalan Mekar Sari',
            'no_hp' => '0821888888',
            'ayah' => 'Budi',
            'ibu' => 'Astuti',
            'sekolah_id' => '2',
            'users_id' => '3',
            'isActive' => '1'
        ]);
        Siswa::create([
            'nis' => '3235344',
            'nama_siswa' => 'Menik',
            'tempat_lahir' => 'Jalan Kenangan',
            'tanggal_lahir' => '2002-02-21',
            'jenis_kelamin' => 'Perempuan',
            'agama' => 'Islam',
            'alamat' => 'Jalan Mulawarman',
            'no_hp' => '0821888888',
            'ayah' => 'Budi',
            'ibu' => 'Astuti',
            'sekolah_id' => '3',
            'users_id' => '4',
            'isActive' => '1'
        ]);

    }
}
