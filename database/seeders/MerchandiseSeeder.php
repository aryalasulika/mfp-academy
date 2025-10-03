<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Merchandise;

class MerchandiseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $merchandiseData = [
            [
                'name' => 'Jersey Home MFP Academy',
                'price' => 250000,
                'image' => 'template/img/mfp/mrc1.webp',
                'description' => 'Jersey kandang resmi MFP Academy dengan kualitas premium dan desain modern. Dibuat dengan teknologi dry-fit yang memberikan kenyamanan maksimal saat berlatih.',
                'category' => 'Jersey',
                'is_active' => true
            ],
            [
                'name' => 'Jersey Away MFP Academy',
                'price' => 250000,
                'image' => 'template/img/mfp/mrc2.webp',
                'description' => 'Jersey tandang resmi MFP Academy dengan material berkualitas tinggi. Didesain khusus untuk para pemain dengan performa terbaik.',
                'category' => 'Jersey',
                'is_active' => true
            ],
            [
                'name' => 'Training Jacket MFP',
                'price' => 180000,
                'image' => 'template/img/mfp/mrc3.webp',
                'description' => 'Jaket latihan resmi MFP Academy untuk aktivitas training dan kasual. Cocok digunakan dalam berbagai cuaca dengan bahan yang tahan lama.',
                'category' => 'Jaket',
                'is_active' => true
            ],
            [
                'name' => 'Polo Shirt MFP Academy',
                'price' => 150000,
                'image' => 'template/img/mfp/mrc4.webp',
                'description' => 'Polo shirt kasual dengan logo MFP Academy untuk kegiatan sehari-hari. Bahan yang nyaman dan design yang stylish untuk segala aktivitas.',
                'category' => 'Kaos',
                'is_active' => true
            ],
            [
                'name' => 'Training Shorts MFP',
                'price' => 120000,
                'image' => 'template/img/mfp/mrc5.webp',
                'description' => 'Celana pendek training dengan teknologi dry-fit untuk kenyamanan maksimal. Dirancang khusus untuk memberikan fleksibilitas gerak yang optimal.',
                'category' => 'Celana',
                'is_active' => true
            ],
            [
                'name' => 'Tas Ransel MFP Academy',
                'price' => 200000,
                'image' => 'template/img/mfp/mrc6.webp',
                'description' => 'Tas ransel resmi MFP Academy dengan kompartemen khusus untuk peralatan sepak bola. Terbuat dari bahan berkualitas tinggi dan tahan lama.',
                'category' => 'Aksesoris',
                'is_active' => true
            ]
        ];

        foreach ($merchandiseData as $data) {
            Merchandise::create($data);
        }
    }
}
