<?php
namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class JadwalLatihanSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('jadwal_latihan')->insert([
            [
                'hari' => 'Senin',
                'jam' => '16:00 - 18:00',
                'kelompok_usia' => 'U-10',
                'lokasi' => 'Lapangan A',
                'tanggal' => '2025-06-02',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'hari' => 'Rabu',
                'jam' => '16:00 - 18:00',
                'kelompok_usia' => 'U-12',
                'lokasi' => 'Lapangan B',
                'tanggal' => '2025-06-04',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'hari' => 'Jumat',
                'jam' => '16:00 - 18:00',
                'kelompok_usia' => 'U-14',
                'lokasi' => 'Lapangan C',
                'tanggal' => '2025-06-06',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
