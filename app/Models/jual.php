<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class jual extends Model
{
    use HasFactory;
    protected $with = ['jenissampah'];
    protected $fillable = ['jenis_sampah_id', 'user_id', 'nama', 'berat_sampah', 'total_harga', 'gambar'];

    public function jenissampah()
    {
        return $this->belongsTo(JenisSampah::class, 'jenis_sampah_id');
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
