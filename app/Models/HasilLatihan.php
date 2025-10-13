<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class HasilLatihan extends Model
{
    protected $fillable = [
        'jadwal_latihan_id',
        'deskripsi',
        'catatan_pelatih',
    ];

    /**
     * Relasi ke JadwalLatihan
     */
    public function jadwalLatihan()
    {
        return $this->belongsTo(JadwalLatihan::class);
    }
}
