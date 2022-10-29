<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ActivityLog extends Model
{
    use HasFactory;
    protected $table = 'activity_log';
    protected $primaryKey = 'id';
    protected $fillable = [
        'nama', 'aktivitas', 'tanggal'
    ];
    public function User()
    {
        return $this->belongsTo(User::class, 'users_id');
    }
}
