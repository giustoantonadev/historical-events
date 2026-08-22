<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // Seed core data only. Multilang copies and dedupe scripts are one-time maintenance
        // and were removed to simplify seeders.
        $this->call([
            PeriodSeeder::class,
            HistoricalPersonSeeder::class,
            HistoricalEventSeeder::class,
        ]);
    }
}
