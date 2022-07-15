<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Saldo extends Model
{
    use HasFactory;
    protected $table = 'saldo';
    protected $primaryKey = 'id';
    protected $fillable = [
        'sekolah_id', 'debit', 'kredit', 'saldo'
    ];
    public function Sekolah()
    {
        return $this->belongsTo(Sekolah::class, 'sekolah_id','id');
    }
    
}
