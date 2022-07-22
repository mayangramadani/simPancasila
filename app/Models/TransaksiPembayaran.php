<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TransaksiPembayaran extends Model
{
    use HasFactory;
    protected $table = 'transaksi_pembayaran';
    protected $primaryKey = 'id';
    protected $fillable = [
        'siswa_id', 'kategori_pembayaran_id', 'tahun', 'bulan_pembayaran', 'jumlah_pembayaran', 'bukti_pembayaran'
    ];
    public function Siswa()
    {
        return $this->belongsTo(Siswa::class, 'siswa_id','id');
    }
    public function KategoriPembayaran()
    {
        return $this->belongsTo(KategoriPembayaran::class, 'kategori_pembayaran_id','id');
    }
}
