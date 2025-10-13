<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class JadwalLatihan extends Model
{
    use HasFactory;
    protected $table = 'jadwal_latihan';
    protected $fillable = [
        'hari',
        'jam_in',
        'jam_out',
        'kelompok_usia',
        'jenis_latihan',
        'lokasi',
        'tanggal',
    ];

    /**
     * Relasi ke HasilLatihan
     */
    public function hasilLatihan()
    {
        return $this->hasOne(HasilLatihan::class);
    }
}
