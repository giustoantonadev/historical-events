<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\HistoricalPerson;

class ApiPersonController extends Controller
{
    public function index()
    {
        $lang = request()->query('lang') ?? app()->getLocale();
        $suffix = in_array($lang, ['it', 'en', 'fr']) ? $lang : 'it';

        $people = HistoricalPerson::with(['historicalEvents'])
            ->orderBy('birth_year', 'asc')
            ->get()
            ->map(function ($p) use ($suffix) {
                $nameKey = 'name_' . $suffix;
                $bioKey = 'biography_' . $suffix;

                $events = $p->historicalEvents->map(function ($e) use ($suffix) {
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
                return $arr;
            });

        return $people;
    }
    public function show($id)
    {
        $lang = request()->query('lang') ?? app()->getLocale();
        $suffix = in_array($lang, ['it', 'en', 'fr']) ? $lang : 'it';

        $p = HistoricalPerson::with(['historicalEvents'])->findOrFail($id);

        $nameKey = 'name_' . $suffix;
        $bioKey = 'biography_' . $suffix;

        $events = $p->historicalEvents->map(function ($e) use ($suffix) {
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

        return $arr;
    }
}
