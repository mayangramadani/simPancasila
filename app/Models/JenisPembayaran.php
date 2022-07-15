<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class JenisPembayaran extends Model
{
    use HasFactory;
    protected $table = 'jenis_pembayaran';
    protected $primaryKey = 'id';
    protected $fillable = [
        'nama_pembayaran', 'keterangan'
    ];
    public function Pembayaran()
    {
        return $this->belongsTo(Pembayaran::class, 'pembayaran_id','id');
    }
}
