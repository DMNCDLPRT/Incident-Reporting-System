<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;

class ContactSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $items = [
            ['number' => '09774347454', 'departments_id' => 1, 'department_id' => 1, 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['number' => '09358774421', 'departments_id' => 2, 'department_id' => 2, 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['number' => '09103634532', 'departments_id' => 3, 'department_id' => 3, 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['number' => '09774347453', 'departments_id' => 4, 'department_id' => 4, 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()]
        ];

        foreach ($items as $item) {
            DB::table('contacts')->insert($item);
        }
    }
}
