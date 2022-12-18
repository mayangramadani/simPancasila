<?php

namespace App\Imports;

use App\Models\Siswa;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class SiswaImport implements ToModel
{
    /**
     * @param array $row
     *
     * @return \Illuminate\Database\Eloquent\Model|null
     */
    public function model(array $row)
    {
        $user = User::create([
            'email' => $row[11],
            'name'     => $row[1],
            'password'     => bcrypt($row[0]),
        ]);
        $siswa = new Siswa([
            'kelas_id' => 1,
            'isActive' => 1,
            'sekolah_id' => 1,
            'users_id' => $user->id,
            'nis' => $row[0],
            'nama_siswa' => $row[1],
            'tempat_lahir' => $row[2],
            'tanggal_lahir' => $row[3],
            'jenis_kelamin' => $row[4],
            'agama' => $row[5],
            'alamat' => $row[6],
            'no_hp' => $row[7],
            'foto' => $row[8],
            'ayah' => $row[9],
            'ibu' => $row[10],
            
        ]);
        return $siswa;
    }
}
