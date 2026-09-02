<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Period;

class ApiPeriodController extends Controller
{
    public function index(): array
    {
        $lang = request()->query('lang') ?? app()->getLocale();
        $periods = Period::all();

        $result = [];
        foreach ($periods as $period) {
            $suffix = in_array($lang, ['it', 'en', 'fr']) ? $lang : 'it';
            $nameKey = 'name_' . $suffix;
            $descKey = 'description_' . $suffix;

            $attrs = $period->toArray();
            $attrs['name'] = $period->{$nameKey} ?: $period->name;
            $attrs['description'] = $period->{$descKey} ?: $period->description;

            $result[] = $attrs;
        }

        return $result;
    }

    public function show(int|string $id): array
    {
        $lang = request()->query('lang') ?? app()->getLocale();
        $suffix = in_array($lang, ['it', 'en', 'fr']) ? $lang : 'it';
        $nameKey = 'name_' . $suffix;
        $descKey = 'description_' . $suffix;

        $period = Period::with('events')->findOrFail($id);

        $period->name = $period->{$nameKey} ?: $period->name;
        $period->description = $period->{$descKey} ?: $period->description;

        return $period->toArray();
    }
}
