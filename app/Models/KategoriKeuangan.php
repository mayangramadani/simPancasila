<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class KategoriKeuangan extends Model
{
    use HasFactory;
    protected $table = 'kategori_keuangan';
    protected $primaryKey = 'id';
    protected $fillable = [
        'nama_keuangan', 'kategori_keuangan', 'deskripsi'
    ];
    public function Keuangan()
    {
        return $this->belongsTo(Keuangan::class, 'keuangan_id', 'id');
    }
}
