<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pemasukan extends Model
{
    use HasFactory;
    protected $table = 'pemasukan';
    protected $primaryKey = 'id';
    protected $fillable = [
        'jenis_pemasukan', 'tanggal_pemasukan', 'jumlah_pemasukan','total', 'bukti_pemasukan'
    ];
    public function Keuangan()
    {
        return $this->belongsTo(Keuangan::class, 'keuangan_id', 'id');
    }
    public function PembayaranSiswa()
    {
        return $this->belongsTo(PembayaranSiswa::class, 'PembayaranSiswa_id', 'id');
    }
}
