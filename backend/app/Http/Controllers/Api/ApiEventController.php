<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\HistoricalEvent;
use App\Models\HistoricalPerson;
use App\Models\Period;

class ApiEventController extends Controller
{
    public function index(): array
    {
        $lang = request()->query('lang') ?? app()->getLocale();
        $suffix = in_array($lang, ['it', 'en', 'fr']) ? $lang : 'it';

        $eventsCollection = HistoricalEvent::with(['period', 'historicalPeople'])
            ->orderBy('year', 'asc')
            ->get();

        $events = [];
        foreach ($eventsCollection as $e) {
            $people = [];
            foreach ($e->historicalPeople as $p) {
                $nameKey = 'name_' . $suffix;
                $bioKey = 'biography_' . $suffix;
                $people[] = [
                    'id' => $p->id,
                    'name' => $p->{$nameKey} ?: $p->name,
                    'birth_year' => $p->birth_year,
                    'biography' => $p->{$bioKey} ?: $p->biography,
                    'image' => $p->portrait ?? null,
                ];
            }

            $arr = $e->toArray();
            $titleKey = 'title_' . $suffix;
            $descKey = 'description_' . $suffix;

            $arr['title'] = $e->{$titleKey} ?: $e->title;
            $arr['description'] = $e->{$descKey} ?: $e->description;

            if ($e->period) {
                $pNameKey = 'name_' . $suffix;
                $e->period->name = $e->period->{$pNameKey} ?: $e->period->name;
                $arr['period'] = $e->period->toArray();
            }

            $arr['people'] = $people;
            $arr['historical_people'] = $people;
            $events[] = $arr;
        }

        return $events;
    }

    public function show(int|string $id): array
    {
        $lang = request()->query('lang') ?? app()->getLocale();
        $suffix = in_array($lang, ['it', 'en', 'fr']) ? $lang : 'it';

        $e = HistoricalEvent::with(['period', 'historicalPeople'])->findOrFail($id);

        $people = [];
        foreach ($e->historicalPeople as $p) {
            $nameKey = 'name_' . $suffix;
            $bioKey = 'biography_' . $suffix;
            $people[] = [
                'id' => $p->id,
                'name' => $p->{$nameKey} ?: $p->name,
                'birth_year' => $p->birth_year,
                'biography' => $p->{$bioKey} ?: $p->biography,
                'image' => $p->portrait ?? null,
            ];
        }
        $arr = $e->toArray();
        $titleKey = 'title_' . $suffix;
        $descKey = 'description_' . $suffix;

        $arr['title'] = $e->{$titleKey} ?: $e->title;
        $arr['description'] = $e->{$descKey} ?: $e->description;

        // period localized
        if ($e->period) {
            $pNameKey = 'name_' . $suffix;
            $e->period->name = $e->period->{$pNameKey} ?: $e->period->name;
            $arr['period'] = $e->period->toArray();
        }

        $arr['people'] = $people;
        $arr['historical_people'] = $people;

        return $arr;
    }
}
