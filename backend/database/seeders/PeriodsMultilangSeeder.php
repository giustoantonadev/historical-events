<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Period;

class PeriodsMultilangSeeder extends Seeder
{
    public function run(): void
    {
        Period::query()->update([
            'name_it' => \DB::raw('name'),
            'name_en' => \DB::raw('name'),
            'name_fr' => \DB::raw('name'),
            'description_it' => \DB::raw('description'),
            'description_en' => \DB::raw('description'),
            'description_fr' => \DB::raw('description'),
        ]);
    }
}

