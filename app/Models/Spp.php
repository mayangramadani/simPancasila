<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Spp extends Model
{
    use HasFactory;
    protected $table = 'spp';
    protected $guarded = [];

    public function siswa(){
        return $this->hasMany(DataSiswa::class);
    }

    // ini coba
	protected $fillable = [
		'siswa_id', 'transaksi_id', 'payment_method', 'amount', 'for_month', 'photo', 'description', 'status', 'expired_at', 'approved_at', 'expired_at', 'is_expired', 'admins_id'
	];

    public function transaksi()
    {
        return $this->belongsTo(Transaksi::class,'transaksi_id');
    }
    public function user()
    {
        return $this->belongsTo(User::class,'users_id');
    }

  

}
