<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\HistoricalEvent;

class ApiEventController extends Controller
{
    public function index()
    {
        $events = HistoricalEvent::with(['period', 'historicalPeople'])
            ->orderBy('year', 'asc')
            ->get()
            ->map(function ($e) {
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
