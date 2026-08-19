<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\HistoricalPerson;

class PeopleMultilangSeeder extends Seeder
{
    public function run(): void
    {
        HistoricalPerson::query()->update([
            'name_it' => \DB::raw('name'),
            'name_en' => \DB::raw('name'),
            'name_fr' => \DB::raw('name'),
            'biography_it' => \DB::raw('biography'),
            'biography_en' => \DB::raw('biography'),
            'biography_fr' => \DB::raw('biography'),
        ]);
    }
}
