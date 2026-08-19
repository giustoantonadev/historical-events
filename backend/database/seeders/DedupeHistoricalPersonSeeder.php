<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DedupeHistoricalPersonSeeder extends Seeder
{
    public function run(): void
    {
        // Find names that appear more than once
        $duplicates = DB::table('historical_people')
            ->select('name', DB::raw('COUNT(*) as cnt'))
            ->groupBy('name')
            ->havingRaw('COUNT(*) > 1')
            ->pluck('name');

        foreach ($duplicates as $name) {
            $rows = DB::table('historical_people')
                ->where('name', $name)
                ->orderBy('id')
                ->get();

            // Keep the first row, delete the rest
            $keepId = $rows->first()->id;
            $deleteIds = $rows->pluck('id')->filter(fn($id) => $id !== $keepId)->all();

            if (!empty($deleteIds)) {
                DB::table('historical_people')->whereIn('id', $deleteIds)->delete();
            }
        }
    }
}
