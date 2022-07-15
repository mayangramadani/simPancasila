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
        'saldo_id', 'jenis_keuangan_id', 'user_id', 'nama_keuangan', 'jenis_keuangan', 'jumlah', 'tanggal', 'deskripsi', 'bukti'
    ];
    public function Saldo()
    {
        return $this->belongsTo(Saldo::class, 'saldo_id', 'id');
    }
}
