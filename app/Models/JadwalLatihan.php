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
        'jam',
        'kelompok_usia',
        'jenis_latihan',
        'lokasi',
        'tanggal',
    ];
}
