<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Keuangan extends Model
{
    use HasFactory;
    protected $table = 'keuangan';
    protected $primaryKey = 'id';
    protected $fillable = [
        'kategori_keuangan_id', 'sekolah_id', 'berkas_pendukung', 'users_id', 'no_transaksi', 'nama_keuangan', 'jumlah', 'tanggal', 'deskripsi', 'bukti', 'status_pembayaran'
    ];
    public function KategoriKeuangan()
    {
        return $this->belongsTo(KategoriKeuangan::class, 'kategori_keuangan_id', 'id');
    }
    public function User()
    {
        return $this->belongsTo(User::class, 'users_id', 'id');
    }
    public function Sekolah()
    {
        return $this->belongsTo(Sekolah::class, 'sekolah_id', 'id');
    }

}
