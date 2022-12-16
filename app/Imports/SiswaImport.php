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
            'users_id' => $user->id,
            'foto' => $row[8],
            'ayah' => $row[9],
            'ibu' => $row[10],
        ]);
        return $siswa;
    }
}
