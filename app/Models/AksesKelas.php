<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AksesKelas extends Model
{
    use HasFactory;
    protected $table = 'siswa_kelas';
    protected $primaryKey = 'id';
    protected $fillable = [
        'siswa_id', 'kelas_id'
    ];
    public function Siswa()
    {
        return $this->belongsTo(Siswa::class, 'siswa_id','id');
    }
    public function DataKelas()
    {
        return $this->belongsTo(DataKelas::class, 'kelas_id','id');
    }
}
