<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SumberDana extends Model
{
    use HasFactory;
    protected $table = 'sumber_dana';
    protected $primaryKey = 'id';
    protected $fillable = [
        'sumber_dana', 'deskripsi'
    ];
}
