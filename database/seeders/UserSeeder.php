<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        /* User::create([
            // 'id' => \Ramsey\Uuid\Uuid::uuid4()->toString(),
            'name' => 'guest',
            'email' => 'guest@guest',
            'phone' => '09774347454',
            'region' => 'REGION X (NORTHERN MINDANAO)',
            'province' => 'BUKIDNON',
            'city' => 'KITAOTAO',
            'barangay' => 'POBLACION',
            'email_verified_at' => now(),
            'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
            'google_id' => '',
        ])->assignRole('User'); */
    }
}
