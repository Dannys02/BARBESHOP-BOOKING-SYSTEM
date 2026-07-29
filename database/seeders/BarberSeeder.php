<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Barber;

class BarberSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $barbers = [
            [
                'name' => 'Bagus Saputra',
                'photo' => 'barbers/eDm6T75gE3fBlReSyZgWu8IRMn5RCdh360kQzHmc.jpg',
                'bio' => 'Pengalaman cukur rambut selama 5 tahun dan penghargaan juara satu cukur kabupaten.',
            ],
            [
                'name' => 'Ahmad Wahidi',
                'photo' => 'barbers/pkCRRFb8JXLPNBAEqdDo8bQbAXxAyWfqnxE1b2fI.jpg',
                'bio' => 'Berpengalaman hampir 10 tahun dalam bidang barbering dan grooming profesional.',
            ],
            [
                'name' => 'Jafar Rohman',
                'photo' => 'barbers/XrFwntEUNKw0KDrttj6Cd39nP9Od9OBNU0TFbhIZ.jpg',
                'bio' => 'Berpengalaman dalam mencukur lebih dari 1000 pelanggan dengan teknik modern.',
            ],
            [
                'name' => 'Ali Roy',
                'photo' => 'barbers/qx28zgSgo40lX08LHBNWERWqeYM0Y804DZyz5Aw4.jpg',
                'bio' => 'Pengalaman 5 tahun dalam bidang perawatan rambut dan styling pria.',
            ],
            [
                'name' => 'Muhammad Anton',
                'photo' => 'barbers/default.jpg',
                'bio' => 'Barber muda berbakat dengan spesialisasi fade cut dan skin fade.',
            ],
        ];

        foreach ($barbers as $barber) {
            Barber::create($barber);
        }
    }
}