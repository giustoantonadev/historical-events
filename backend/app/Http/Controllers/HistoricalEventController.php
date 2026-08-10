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
        return view('events.index', compact('historicalEvents'));

    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $periods = Period::all();
        $historicalPeople = HistoricalPerson::all();
        return view('events.create', compact('periods', 'historicalPeople'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'year' => 'required|integer',
            'image' => 'nullable|image',
            'period_id' => 'required|exists:periods,id',
            'historical_person_ids' => 'nullable|array',
            'historical_person_ids.*' => 'exists:historical_people,id',
        ]);

        $data = $request->only(['title', 'description', 'year', 'period_id']);
        if ($request->hasFile('image')) {
            $data['image'] = $request->file('image')->store('images', 'public');
        }

        $historicalEvent = HistoricalEvent::create($data);

        if (!empty($request->input('historical_person_ids'))) {
            $historicalEvent->historicalPeople()->attach($request->input('historical_person_ids'));
        }

        return redirect()->route('events.index')->with('success', 'Historical event created successfully.');
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
        return view('events.edit', compact('historicalEvent', 'periods', 'historicalPeople'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $historicalEvent = HistoricalEvent::findOrFail($id);

        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'year' => 'required|integer',
            'image' => 'nullable|image',
            'period_id' => 'required|exists:periods,id',
            'historical_person_ids' => 'nullable|array',
            'historical_person_ids.*' => 'exists:historical_people,id',
        ]);

        $data = $request->only(['title', 'description', 'year', 'period_id']);
        if ($request->hasFile('image')) {
            $data['image'] = $request->file('image')->store('images', 'public');
        }

        $historicalEvent->update($data);

        if (!empty($request->input('historical_person_ids'))) {
            $historicalEvent->historicalPeople()->sync($request->input('historical_person_ids'));
        } else {
            $historicalEvent->historicalPeople()->detach();
        }

        return redirect()->route('events.index')->with('success', 'Historical event updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        // delete event
        $historicalEvent = HistoricalEvent::findOrFail($id);
        $historicalEvent->historicalPeople()->detach(); // Detach related historical people
        $historicalEvent->delete();       
    }
}
