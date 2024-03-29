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
        'tingkatan_kelas_id', 'nama_kelas',  'kuota'
    ];

    public function TingkatanKelas()
    {
        return $this->belongsTo(TingkatanKelas::class, 'tingkatan_kelas_id', 'id');
    }
}
