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
        'kelas_id', 'nis', 'nama_siswa', 'tempat_lahir', 'tanggal_lahir', 'jenis_kelamin', 'alamat', 'agama', 'no_hp', 'foto', 'ayah', 'ibu'
    ];
    public function DataKelas()
    {
        return $this->belongsTo(DataKelas::class, 'kelas_id', 'id');
    }
}
