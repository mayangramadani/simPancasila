<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pengeluaran extends Model
{
    use HasFactory;
    protected $table = 'Pengeluaran';
    protected $primaryKey = 'id';
    protected $fillable = [
        'jenis_pengeluaran', 'tanggal_pengeluaran', 'jumlah_pengeluaran', 'bukti_pengeluaran'
    ];
    public function Keuangan()
    {
        return $this->belongsTo(Keuangan::class, 'keuangan_id', 'id');
    }
    public function JenisPengeluaran()
    {
        return $this->belongsTo(JenisPengeluaran::class, 'jenispengeluaran_id', 'id');
    }
}
