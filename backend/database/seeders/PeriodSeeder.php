<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Period;

class PeriodSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $periods = [
            ['name' => 'Antichità', 'start_date' => '0100-01-01', 'end_date' => '0500-12-31'],
            ['name' => 'Medioevo', 'start_date' => '0501-01-01', 'end_date' => '1492-12-31'],
            ['name' => 'Rinascimento', 'start_date' => '1493-01-01', 'end_date' => '1600-12-31'],
            ['name' => 'Età Moderna', 'start_date' => '1601-01-01', 'end_date' => '1900-12-31'],
            ['name' => 'Età Contemporanea', 'start_date' => '1901-01-01', 'end_date' => '2024-12-31'],
        ];


        foreach ($periods as $period) {
            Period::create($period);
        }
    }
}
