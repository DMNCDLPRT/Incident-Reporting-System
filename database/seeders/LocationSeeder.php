<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class LocationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $items = [
            ['location_id' => 1, 'location_name' => 'Cabadiangan'],
            ['location_id' => 2, 'location_name' => 'Bocboc'],
            ['location_id' => 3, 'location_name' => 'Buyot'],
            ['location_id' => 4, 'location_name' => 'Calaocalao'],
            ['location_id' => 5, 'location_name' => 'Don Carlos Norte'],
            ['location_id' => 6, 'location_name' => 'Embayao'],
            ['location_id' => 7, 'location_name' => 'Kalubihon'],
            ['location_id' => 8, 'location_name' => 'Kasigkot'],
            ['location_id' => 9, 'location_name' => 'Kawilihan'],
            ['location_id' => 10, 'location_name' => 'Kiara'],
            ['location_id' => 11, 'location_name' => 'Kibatang'],
            ['location_id' => 12, 'location_name' => 'Mahayahay'],
            ['location_id' => 14, 'location_name' => 'Maraymaray'],
            ['location_id' => 15, 'location_name' => 'Mauswagon'],
            ['location_id' => 16, 'location_name' => 'Minsalagan'],
            ['location_id' => 17, 'location_name' => 'Manlamonay'],
            ['location_id' => 18, 'location_name' => 'New Nongnongan - Masimagmonay'],
            ['location_id' => 19, 'location_name' => 'New Visayas'],
            ['location_id' => 20, 'location_name' => 'Pinamaloy'],
            ['location_id' => 21, 'location_name' => 'Don Carlos Sur - Poblacion'],
            ['location_id' => 22, 'location_name' => 'Pualas'],
            ['location_id' => 23, 'location_name' => 'San Antonio East'],
            ['location_id' => 24, 'location_name' => 'San Antonio West'],
            ['location_id' => 25, 'location_name' => 'San Francisco'],
            ['location_id' => 26, 'location_name' => 'San Nicolas - Banban'],
            ['location_id' => 27, 'location_name' => 'San Roque'],
            ['location_id' => 28, 'location_name' => 'Sinangguyan'],
            ['location_id' => 29, 'location_name' => 'Bismartz'],
        ];
    
        foreach ($items as $item) {
            DB::table('locations')->insert($item);
        }
    }
}
