<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;
use App\Models\ReportType;

class ReportTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $items = [
            ['report_id' => 1, 'report_name' => 'Traffic Accident'],
            ['report_id' => 2, 'report_name' => 'Fire incident'],
            ['report_id' => 3, 'report_name' => 'Shooting Incident'],
            ['report_id' => 4, 'report_name' => 'Hacking Incident'],
            ['report_id' => 5, 'report_name' => 'Stabbing Incident'],
            ['report_id' => 6, 'report_name' => 'Alarm and Scandal'],
            ['report_id' => 7, 'report_name' => 'Ambush'],
            ['report_id' => 8, 'report_name' => 'Carnapping/Motornapping'],
            ['report_id' => 9, 'report_name' => 'Cellphone Snatching'],
            ['report_id' => 10, 'report_name' => 'Flood - Natural Disaster'],
            ['report_id' => 11, 'report_name' => 'Rape Incident'],
            ['report_id' => 12, 'report_name' => 'Suicide'],
            ['report_id' => 13, 'report_name' => 'Theft/Robbery'],
        ];
    
        foreach ($items as $item) {
            DB::table('report_types')->insert($item);
        }
    }
}
