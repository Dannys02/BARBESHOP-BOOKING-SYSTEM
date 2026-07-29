<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Service;

class ServiceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $services = [
            [
                'name' => 'Haircut & Styling',
                'price' => 50000,
                'duration' => 45,
            ],
            [
                'name' => 'Beard Trim',
                'price' => 30000,
                'duration' => 20,
            ],
            [
                'name' => 'The Executive Cut',
                'price' => 75000,
                'duration' => 45,
            ],
            [
                'name' => "Gentlemen's Grooming",
                'price' => 125000,
                'duration' => 60,
            ],
            [
                'name' => 'Express Fresh Trim',
                'price' => 50000,
                'duration' => 30,
            ],
        ];

        foreach ($services as $service) {
            Service::create($service);
        }
    }
}