<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class InvoicePembayaran extends Model
{
    use HasFactory;
    protected $table = 'keuangan';
    protected $primaryKey = 'id';
    protected $fillable = [
        'kategori_keuangan_id', 'sumber_dana', 'berkas_pendukung', 'users_id', 'no_transaksi', 'nama_keuangan', 'jumlah', 'tanggal', 'deskripsi', 'bukti', 'status_pembayaran'
    ];
    public function KategoriKeuangan()
    {
        return $this->belongsTo(KategoriKeuangan::class, 'kategori_keuangan_id', 'id');
    }
    public function Siswa()
    {
        return $this->belongsTo(Siswa::class, 'siswa_id');
    }
}