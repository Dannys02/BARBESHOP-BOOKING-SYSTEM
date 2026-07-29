<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Activity;

class ActivitySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $activities = [
            [
                'description' => 'Reservasi baru dibuat oleh Erza Kurniawan untuk Haircut & Styling.',
                'type' => 'booking',
            ],
            [
                'description' => 'Update status Erza Kurniawan: PENDING -> KONFIRMASI.',
                'type' => 'booking',
            ],
            [
                'description' => 'Update status Iza Makmur: KONFIRMASI -> SELESAI.',
                'type' => 'booking',
            ],
            [
                'description' => 'Reservasi Gilang Kamal untuk The Executive Cut telah dibatalkan.',
                'type' => 'booking',
            ],
            [
                'description' => 'Barber baru ditambahkan: Rizky Aditya.',
                'type' => 'barber',
            ],
        ];

        foreach ($activities as $activity) {
            Activity::create($activity);
        }
    }
}