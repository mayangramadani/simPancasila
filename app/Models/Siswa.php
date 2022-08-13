<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Siswa extends Model
{
    use HasFactory;
    protected $table = 'siswa';
    protected $primaryKey = 'id';
    protected $fillable = [
        'nis', 'nama_siswa', 'users_id', 'tempat_lahir', 'isActive', 'tanggal_lahir', 'jenis_kelamin', 'alamat', 'agama', 'no_hp', 'foto', 'ayah', 'ibu'
    ];
}
