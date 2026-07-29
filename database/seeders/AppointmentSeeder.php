<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Appointment;

class AppointmentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $appointments = [
            [
                'service_id' => 1,
                'barber_id' => 1,
                'customer_name' => 'Erza Kurniawan',
                'customer_phone' => '085645837298',
                'booking_date' => '2026-08-01',
                'booking_time' => '15:00:00',
                'status' => 'konfirmasi',
            ],
            [
                'service_id' => 2,
                'barber_id' => 2,
                'customer_name' => 'Maltan Hidayat',
                'customer_phone' => '085645837810',
                'booking_date' => '2026-08-02',
                'booking_time' => '11:00:00',
                'status' => 'pending',
            ],
            [
                'service_id' => 5,
                'barber_id' => 3,
                'customer_name' => 'Iza Makmur',
                'customer_phone' => '081234567890',
                'booking_date' => '2026-08-03',
                'booking_time' => '13:00:00',
                'status' => 'selesai',
            ],
            [
                'service_id' => 3,
                'barber_id' => 4,
                'customer_name' => 'Gilang Kamal',
                'customer_phone' => '089876543210',
                'booking_date' => '2026-08-05',
                'booking_time' => '10:00:00',
                'status' => 'batal',
            ],
            [
                'service_id' => 4,
                'barber_id' => 5,
                'customer_name' => 'Rafi Ananda',
                'customer_phone' => '082345678901',
                'booking_date' => '2026-08-07',
                'booking_time' => '09:30:00',
                'status' => 'pending',
            ],
        ];

        foreach ($appointments as $appointment) {
            Appointment::create($appointment);
        }
    }
}