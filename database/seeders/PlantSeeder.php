<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Plant;

class PlantSeeder extends Seeder
{
    public function run(): void
    {
        Plant::insert([
            [
                'name' => 'Monstera Deliciosa',
                'category' => 'Tanaman Hias',
                'price' => 85000,
                'stock' => 12,
                'image_url' => 'https://images.unsplash.com/photo-1614594975525-e45190c55d0b?w=500',
                'description' => 'Tanaman hias indoor populer dengan daun berlubang estetik yang cocok untuk sudut ruangan.',
                'care_instructions' => 'Cahaya tidak langsung, siram 2-3 kali seminggu saat media tanam mulai kering.',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Bibit Alpukat Aligator',
                'category' => 'Bibit Tanaman',
                'price' => 35000,
                'stock' => 30,
                'image_url' => 'https://images.unsplash.com/photo-1523348837708-15d4a09cfac2?w=500',
                'description' => 'Bibit hasil okulasi cepat berbuah dengan ukuran buah jumbo dan daging tebal.',
                'care_instructions' => 'Butuh sinar matahari penuh, siram pagi dan sore pada fase awal tanam.',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Tabulampot Jeruk Nagami',
                'category' => 'Tanaman Buah',
                'price' => 150000,
                'stock' => 5,
                'image_url' => 'https://images.unsplash.com/photo-1582979512210-99b6a53386f9?w=500',
                'description' => 'Tanaman buah dalam pot yang sudah mulai berbuah, kulit buah manis dan bisa dimakan langsung.',
                'care_instructions' => 'Sinar matahari penuh minimal 6 jam, beri pupuk NPK buah setiap 2 minggu.',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Calathea Orbifolia',
                'category' => 'Tanaman Hias',
                'price' => 65000,
                'stock' => 8,
                'image_url' => 'https://images.unsplash.com/photo-1597055181300-e3633a917c9c?w=500',
                'description' => 'Daun lebar bermotif garis perak hijau yang menenangkan dan aman untuk hewan peliharaan.',
                'care_instructions' => 'Tempat teduh dengan kelembapan tinggi, hindari sinar matahari langsung.',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
