<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sekolah extends Model
{
    use HasFactory;
    protected $table = 'sekolah';
    protected $primaryKey = 'id';
    protected $fillable = [
        'nama_sekolah', 'derajat', 'lokasi', 'spp', 'tingkatan_kelas'
    ];
    public function Siswa()
    {
        return $this->belongsTo(Siswa::class, 'siswa_id');
    }
    public function Kelas()
    {
        return $this->belongsTo(Kelas::class, 'kelas_id');
    }
}
