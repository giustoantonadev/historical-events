<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\HistoricalEvent;

class EventsMultilangSeeder extends Seeder
{
    public function run(): void
    {
        HistoricalEvent::query()->update([
            'title_it' => \DB::raw('title'),
            'title_en' => \DB::raw('title'),
            'title_fr' => \DB::raw('title'),
            'description_it' => \DB::raw('description'),
            'description_en' => \DB::raw('description'),
            'description_fr' => \DB::raw('description'),
        ]);
    }
}
