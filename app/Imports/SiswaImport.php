<?php

namespace App\Imports;

use App\Models\Siswa;
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
        return new Siswa([
            'kelas_id' => 1,
            'nis'     => $row[0],
            'nama_siswa'    => $row[1],
            'tempat_lahir' => $row[2],
            'tanggal_lahir' => $row[3],
            'jenis_kelamin' => $row[4],
            'alamat' => $row[5],
            'agama' => $row[6],
            'no_hp' => $row[7],
            'foto' => $row[8],
            'ayah' => $row[9],
            'ibu' => $row[10],
        ]);
    }
}
