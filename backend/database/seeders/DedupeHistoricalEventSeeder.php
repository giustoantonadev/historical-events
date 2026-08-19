<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DedupeHistoricalEventSeeder extends Seeder
{
    public function run(): void
    {
        // Find titles that appear more than once
        $duplicates = DB::table('historical_events')
            ->select('title', DB::raw('COUNT(*) as cnt'))
            ->groupBy('title')
            ->havingRaw('COUNT(*) > 1')
            ->pluck('title');

        foreach ($duplicates as $title) {
            $rows = DB::table('historical_events')
                ->where('title', $title)
                ->orderBy('id')
                ->get();

            // Keep the first row, delete the rest
            $keepId = $rows->first()->id;
            $deleteIds = $rows->pluck('id')->filter(fn($id) => $id !== $keepId)->all();

            if (!empty($deleteIds)) {
                DB::table('historical_events')->whereIn('id', $deleteIds)->delete();
            }
        }
    }
}
