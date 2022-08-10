<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TingkatanKelas extends Model
{
    use HasFactory;
    protected $table = 'tingkatan_kelas';
    protected $primaryKey = 'id';
    protected $fillable = [
        'nama_tingkatan', 'deskripsi'
    ];
}
