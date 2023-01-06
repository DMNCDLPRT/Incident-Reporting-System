<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class DepartmentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $items = [
            ['department' => 'Don Carlos MPS PNP' , 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['department' => 'Bureau of Fire Protection (BFP)', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['department' => 'Municipal disaster risk reduction management Council (MDRRMC)', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['department' => '2nd Provincial Mobile Force Company (PMFC) PNP', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
        ];

        foreach ($items as $item) {
            DB::table('departments')->insert($item);
        }
    }
}
