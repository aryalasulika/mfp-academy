<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Event;
use Illuminate\Support\Str;
use Carbon\Carbon;

class EventSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $events = [
            [
                'judul' => 'Seleksi Terbuka Future Football Academy 2025',
                'deskripsi' => 'Panggilan untuk talenta muda! Ikuti seleksi terbuka FFA dan wujudkan mimpimu menjadi pesepak bola profesional.',
                'tanggal' => Carbon::create(2025, 10, 11),
                'lokasi' => 'Lapangan Utama FFA',
                'image' => 'storage/events/seleksi-ffa-2025.jpg',
            ],
            [
                'judul' => 'Cristiano Ronaldo Kunjungi Future Football Academy',
                'deskripsi' => 'Sebuah momen bersejarah! CR7 berbagi pengalaman, motivasi, dan teknik latihan tingkat dunia.',
                'tanggal' => Carbon::create(2025, 10, 18),
                'lokasi' => 'Stadion Utama',
                'image' => 'storage/events/kunjungan-cr7.jpg',
            ],
            [
                'judul' => 'Turnamen Persahabatan U-12 se-Jabodetabek',
                'deskripsi' => 'Ajang uji kemampuan dan sportivitas bagi para pemain muda dari berbagai akademi.',
                'tanggal' => Carbon::create(2025, 7, 20),
                'lokasi' => 'Gelanggang Remaja Jakarta',
                'image' => 'storage/events/turnamen-u12.jpg',
            ],
            [
                'judul' => 'Coaching Clinic: Taktik Modern Sepak Bola',
                'deskripsi' => 'Pelatih berlisensi berbagi taktik pressing, build-up, dan transisi modern untuk akademi usia dini.',
                'tanggal' => Carbon::create(2025, 3, 9),
                'lokasi' => 'Ruang Seminar FFA',
                'image' => 'storage/events/coaching-clinic.jpg',
            ],
            [
                'judul' => 'Workshop Nutrisi Atlet Muda',
                'deskripsi' => 'Belajar pola makan, hidrasi, dan recovery agar performa optimal di latihan dan pertandingan.',
                'tanggal' => Carbon::create(2025, 2, 15),
                'lokasi' => 'Aula Serbaguna',
                'image' => 'storage/events/workshop-nutrisi.jpg',
            ],
            [
                'judul' => 'Friendly Match: FFA U-10 vs Akademi Garuda',
                'deskripsi' => 'Uji tanding persahabatan untuk mengasah mental bertanding dan kekompakan tim.',
                'tanggal' => Carbon::create(2024, 12, 5),
                'lokasi' => 'Lapangan Timur',
                'image' => 'storage/events/friendly-u10.jpg',
            ],
            [
                'judul' => 'Peringatan Hari Olahraga Nasional',
                'deskripsi' => 'Senam bersama, mini games, dan pembagian door prize untuk pemain dan orang tua.',
                'tanggal' => Carbon::create(2024, 9, 9),
                'lokasi' => 'Kompleks FFA',
                'image' => 'storage/events/haornas-ffa.jpg',
            ],
            [
                'judul' => 'Pelatihan Kiper Dasar untuk Pemula',
                'deskripsi' => 'Materi shot-stopping, positioning, dan distribusi bola untuk kiper muda.',
                'tanggal' => Carbon::create(2024, 6, 22),
                'lokasi' => 'Lapangan Kiper',
                'image' => 'storage/events/latihan-kiper.jpg',
            ],
            [
                'judul' => 'Seminar Psikologi Olahraga: Mental Juara',
                'deskripsi' => 'Bangun mentalitas pemenang: fokus, disiplin, dan resiliensi untuk atlet usia dini.',
                'tanggal' => Carbon::create(2024, 4, 13),
                'lokasi' => 'Ruang Multimedia',
                'image' => 'storage/events/psikologi-olahraga.jpg',
            ],
            [
                'judul' => 'Camp Liburan Musim Panas 2024',
                'deskripsi' => 'Program intensif 1 minggu: teknik, taktik, fisik, dan mini turnamen penutup.',
                'tanggal' => Carbon::create(2024, 7, 1),
                'lokasi' => 'Kompleks FFA',
                'image' => 'storage/events/camp-musim-panas.jpg',
            ],
            [
                'judul' => 'Orang Tua Gathering & Sharing',
                'deskripsi' => 'Forum dialog bersama pelatih: perkembangan pemain, kurikulum latihan, dan target semester.',
                'tanggal' => Carbon::create(2024, 3, 2),
                'lokasi' => 'Aula Utama',
                'image' => 'storage/events/parent-gathering.jpg',
            ],
            [
                'judul' => 'Pelatihan Fisik Dasar untuk U-13',
                'deskripsi' => 'Circuit training, agility ladder, dan core stability khusus kelompok usia U-13.',
                'tanggal' => Carbon::create(2023, 11, 18),
                'lokasi' => 'Lapangan Indoor',
                'image' => 'storage/events/latihan-fisik-u13.jpg',
            ],
            [
                'judul' => 'Ujian Kenaikan Level Teknik Dasar',
                'deskripsi' => 'Evaluasi dribbling, passing, shooting, dan kontrol bola dengan sertifikat kelulusan.',
                'tanggal' => Carbon::create(2023, 10, 28),
                'lokasi' => 'Lapangan 1',
                'image' => 'storage/events/ujian-level.jpg',
            ],
            [
                'judul' => 'Mini Festival Sepak Bola U-10',
                'deskripsi' => 'Festival satu hari, format fun games untuk mengembangkan kreativitas bermain.',
                'tanggal' => Carbon::create(2023, 8, 12),
                'lokasi' => 'Lapangan Festival',
                'image' => 'storage/events/festival-u10.jpg',
            ],
            [
                'judul' => 'Kunjungan Stadion dan Museum Sepak Bola',
                'deskripsi' => 'Edukasi sejarah sepak bola dan tur stadion untuk menambah wawasan pemain.',
                'tanggal' => Carbon::create(2023, 5, 21),
                'lokasi' => 'Stadion Nasional',
                'image' => 'storage/events/kunjungan-stadion.jpg',
            ],
        ];

        foreach ($events as $data) {
            // Slug akan dibuat otomatis oleh model boot jika tidak disediakan
            Event::create($data);
        }
    }
}
