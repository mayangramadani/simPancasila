<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class InvoicePembayaran extends Model
{
    use HasFactory;
    protected $table = 'keuangan';
    protected $primaryKey = 'id';

    public function Siswa()
    {
        return $this->belongsTo(Siswa::class, 'siswa_id');
    }

}
