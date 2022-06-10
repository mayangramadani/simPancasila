<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DataKelas extends Model
{
    use HasFactory;
    protected $table = 'data_kelas';
    protected $guarded = [];
    protected $primaryKey = 'id';
    public function siswa() {
        return $this->hasMany(Siswa::class);
    }
    // protected $foreignKey = 'data_kelas_id';
}
