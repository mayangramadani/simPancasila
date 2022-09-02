<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TransaksiSiswa extends Model
{
    use HasFactory;
    protected $table = 'keuangan';
    protected $primaryKey = 'id';
    protected $fillable = [
        'users_id', 'kategori_pembayaran_id', 'bulan_pembayaran', 'jumlah_pembayaran', 'bukti_pembayaran'
    ];
    public function User()
    {
        return $this->belongsTo(User::class, 'users_id', 'id');
    }
    public function KategoriPembayaran()
    {
        return $this->belongsTo(KategoriPembayaran::class, 'kategori_pembayaran_id', 'id');
    }
}
