<?php
namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\ContactMessage;
use Illuminate\Support\Str;

class ContactMessageSeeder extends Seeder
{
    public function run()
    {
        $faker = \Faker\Factory::create('id_ID');
        for ($i = 1; $i <= 20; $i++) {
            ContactMessage::create([
                'nama' => $faker->name,
                'email' => $faker->safeEmail,
                'subjek' => $faker->sentence(3),
                'pesan' => $faker->paragraph,
                'is_read' => $i % 3 === 0, // 1/3 sudah dibaca
                'created_at' => $faker->dateTimeBetween('-30 days', 'now'),
            ]);
        }
    }
}
