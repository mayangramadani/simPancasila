<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DataKelas extends Model
{
    use HasFactory;
    protected $table = 'data_kelas';
    protected $primaryKey = 'id';
    protected $fillable = [
        'sekolah_id', 'nama_kelas', 'tingkatan_kelas', 'kuota'
    ];
    public function Siswa()
    {
        return $this->belongsTo(Siswa::class, 'siswa_id','id');
    }
    
}
