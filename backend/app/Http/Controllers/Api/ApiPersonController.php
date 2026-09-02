<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\HistoricalPerson;
use App\Models\HistoricalEvent;

class ApiPersonController extends Controller
{
    public function index(): array
    {
        $lang = request()->query('lang') ?? app()->getLocale();
        $suffix = in_array($lang, ['it', 'en', 'fr']) ? $lang : 'it';

        $peopleCollection = HistoricalPerson::with(['historicalEvents'])
            ->orderBy('birth_year', 'asc')
            ->get();

        $people = [];
        foreach ($peopleCollection as $p) {
            $nameKey = 'name_' . $suffix;
            $bioKey = 'biography_' . $suffix;

            $events = [];
            foreach ($p->historicalEvents as $e) {
                $titleKey = 'title_' . $suffix;
                $events[] = [
                    'id' => $e->id,
                    'title' => $e->{$titleKey} ?: $e->title,
                    'year' => $e->year,
                    'image' => $e->image,
                ];
            }

            $arr = $p->toArray();
            $arr['name'] = $p->{$nameKey} ?: $p->name;
            $arr['biography'] = $p->{$bioKey} ?: $p->biography;
            $arr['historical_events'] = $events;
            $arr['image'] = $p->portrait ?? null;
            $people[] = $arr;
        }

        return $people;
    }

    public function show(int|string $id): array
    {
        $lang = request()->query('lang') ?? app()->getLocale();
        $suffix = in_array($lang, ['it', 'en', 'fr']) ? $lang : 'it';

        $p = HistoricalPerson::with(['historicalEvents'])->findOrFail($id);

        $nameKey = 'name_' . $suffix;
        $bioKey = 'biography_' . $suffix;

        $events = $p->historicalEvents->map(function (HistoricalEvent $e) use ($suffix) {
            $titleKey = 'title_' . $suffix;
            return [
                'id' => $e->id,
                'title' => $e->{$titleKey} ?: $e->title,
                'year' => $e->year,
                'image' => $e->image,
            ];
        })->values();

        $arr = $p->toArray();
        $arr['name'] = $p->{$nameKey} ?: $p->name;
        $arr['biography'] = $p->{$bioKey} ?: $p->biography;
        $arr['historical_events'] = $events;

        $arr['image'] = $p->portrait ?? null;

        return $arr;
    }
}
