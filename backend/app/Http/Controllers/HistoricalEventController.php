<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\HistoricalEvent;
use App\Models\HistoricalPerson;
use App\Models\Period;


class HistoricalEventController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $historicalEvents = HistoricalEvent::with(['period', 'historicalPeople'])->get();
        return response()->json($historicalEvents);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $periods = Period::all();
        $historicalPeople = HistoricalPerson::all();
        return response()->json([   
            'periods' => $periods,
            'historicalPeople' => $historicalPeople,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'year' => 'required|integer',
            'image' => 'nullable|image',
            'period_id' => 'required|exists:periods,id',
            'historical_person_ids' => 'nullable|array',
            'historical_person_ids.*' => 'exists:historical_people,id',
        ]);

        if ($request->hasFile('image')) {
            $data['image'] = $request->file('image')->store('images', 'public');
        }

        $historicalEvent = HistoricalEvent::create($data);

        if (!empty($data['historical_person_ids'])) {
            $historicalEvent->historicalPeople()->sync($data['historical_person_ids']);
        }

        return response()->json($historicalEvent, 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $historicalEvent = HistoricalEvent::with(['period', 'historicalPeople'])->findOrFail($id);
        $periods = Period::all();
        $historicalPeople = HistoricalPerson::all();

        return response()->json([
            'historicalEvent' => $historicalEvent,
            'periods' => $periods,
            'historicalPeople' => $historicalPeople,
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $historicalEvent = HistoricalEvent::findOrFail($id);

        $data = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'year' => 'required|integer',
            'image' => 'nullable|image',
            'period_id' => 'required|exists:periods,id',
            'historical_person_ids' => 'nullable|array',
            'historical_person_ids.*' => 'exists:historical_people,id',
        ]);

        if ($request->hasFile('image')) {
            $data['image'] = $request->file('image')->store('images', 'public');
        }

        $historicalEvent->update($data);

        if (!empty($data['historical_person_ids'])) {
            $historicalEvent->historicalPeople()->sync($data['historical_person_ids']);
        } else {
            $historicalEvent->historicalPeople()->detach();
        }

        return response()->json($historicalEvent);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        // delete event
        $historicalEvent = HistoricalEvent::findOrFail($id);
        $historicalEvent->historicalPeople()->detach(); 
        $historicalEvent->delete();
        return response()->json(null, 204);        
    }
}
