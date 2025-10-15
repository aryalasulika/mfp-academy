<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

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

    /**
     * Accessor gabungan jam_in dan jam_out sebagai "HH:mm - HH:mm" atau "-" jika tidak tersedia.
     */
    public function getJamAttribute(): string
    {
        $format = function ($time) {
            if (!$time || $time === '00:00:00' || $time === '00:00') {
                return null;
            }
            try {
                return Carbon::parse($time)->format('H:i');
            } catch (\Exception $e) {
                return null;
            }
        };

        $jamIn = $format($this->jam_in);
        $jamOut = $format($this->jam_out);

        if ($jamIn && $jamOut) {
            return $jamIn . ' - ' . $jamOut;
        }
        if ($jamIn) {
            return $jamIn;
        }
        if ($jamOut) {
            return $jamOut;
        }
        return '-';
    }
}
