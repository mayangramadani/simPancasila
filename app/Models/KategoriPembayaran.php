<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class KategoriPembayaran extends Model
{
    use HasFactory;
    protected $table = 'kategori_pembayaran';
    protected $primaryKey = 'id';
    protected $fillable = [
        'nama_pembayaran', 'deskripsi_pembayaran', 'harga'
    ];
    public function PembayaranSiswa()
    {
        return $this->belongsTo(PembayaranSiswa::class, 'pembayaransiswa_id', 'id');
    }
}
