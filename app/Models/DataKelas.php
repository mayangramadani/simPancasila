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
        'sekolah_id', 'nama_kelas',  'kuota'
    ];
    public function Sekolah()
    {
        return $this->belongsTo(Sekolah::class, 'sekolah_id', 'id');
    }

    
}
