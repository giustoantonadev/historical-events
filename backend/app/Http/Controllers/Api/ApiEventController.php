<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\HistoricalEvent;

class ApiEventController extends Controller
{
    public function index()
    {
        $lang = request()->query('lang') ?? app()->getLocale();
        $suffix = in_array($lang, ['it', 'en', 'fr']) ? $lang : 'it';

        $events = HistoricalEvent::with(['period', 'historicalPeople'])
            ->orderBy('year', 'asc')
            ->get()
            ->map(function ($e) use ($suffix) {
                $people = $e->historicalPeople->map(function ($p) use ($suffix) {
                    $nameKey = 'name_' . $suffix;
                    $bioKey = 'biography_' . $suffix;
                    return [
                        'id' => $p->id,
                        'name' => $p->{$nameKey} ?: $p->name,
                        'birth_year' => $p->birth_year,
                        'biography' => $p->{$bioKey} ?: $p->biography,
                        'image' => $p->image,
                    ];
                })->values();

                $arr = $e->toArray();
                $titleKey = 'title_' . $suffix;
                $descKey = 'description_' . $suffix;

                $arr['title'] = $e->{$titleKey} ?: $e->title;
                $arr['description'] = $e->{$descKey} ?: $e->description;

                // period localized
                if ($e->period) {
                    $pNameKey = 'name_' . $suffix;
                    $e->period->name = $e->period->{$pNameKey} ?: $e->period->name;
                }

                $arr['people'] = $people;
                $arr['historical_people'] = $people;
                return $arr;
            });

        return $events;
    }

    public function show($id)
    {
        $e = HistoricalEvent::with(['period', 'historicalPeople'])->findOrFail($id);

        $people = $e->historicalPeople->map(function ($p) {
            return [
                'id' => $p->id,
                'name' => $p->name,
                'birth_year' => $p->birth_year,
                'biography' => $p->biography,
                'image' => $p->image,
            ];
        })->values();

        $arr = $e->toArray();
        $arr['people'] = $people;
        $arr['historical_people'] = $people;

        return $arr;
    }
}
