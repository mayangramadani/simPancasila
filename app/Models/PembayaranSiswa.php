<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PembayaranSiswa extends Model
{
    use HasFactory;
    protected $table = 'pembayaran_siswas';
    protected $guarded = [];

    public function siswa(){
        return $this->hasMany(DataSiswa::class);
    }
}
