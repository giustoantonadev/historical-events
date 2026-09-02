<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreHistoricalEventRequest;
use App\Http\Requests\UpdateHistoricalEventRequest;
use App\Models\HistoricalEvent;
use App\Models\HistoricalPerson;
use App\Models\Period;


class HistoricalEventController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(): \Illuminate\Contracts\View\View
    {
        $historicalEvents = HistoricalEvent::orderBy('year', 'asc')->get();
        return view('events.index', compact('historicalEvents'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): \Illuminate\Contracts\View\View
    {
        $periods = Period::all();
        $historicalPeople = HistoricalPerson::all();
        return view('events.create', compact('periods', 'historicalPeople'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreHistoricalEventRequest $request): \Illuminate\Http\RedirectResponse
    {
        $data = $request->only([
            'title',
            'description',
            'year',
            'period_id',
            'title_it',
            'title_en',
            'title_fr',
            'description_it',
            'description_en',
            'description_fr',
        ]);
        if ($request->hasFile('image')) {
            $data['image'] = $request->file('image')->store('events', 'public');
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
    public function show(string $id): \Illuminate\Contracts\View\View
    {
        $historicalEvent = HistoricalEvent::with(['period', 'historicalPeople'])->findOrFail($id);
        return view('events.show', compact('historicalEvent'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id): \Illuminate\Contracts\View\View
    {
        $historicalEvent = HistoricalEvent::with(['period', 'historicalPeople'])->findOrFail($id);
        $periods = Period::all();
        $historicalPeople = HistoricalPerson::all();
        return view('events.edit', compact('historicalEvent', 'periods', 'historicalPeople'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateHistoricalEventRequest $request, string $id): \Illuminate\Http\RedirectResponse
    {
        $historicalEvent = HistoricalEvent::findOrFail($id);

        $data = $request->only([
            'title',
            'description',
            'year',
            'period_id',
            'title_it',
            'title_en',
            'title_fr',
            'description_it',
            'description_en',
            'description_fr',
        ]);
        if ($request->hasFile('image')) {
            $data['image'] = $request->file('image')->store('events', 'public');
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
    public function destroy(string $id): \Illuminate\Http\RedirectResponse
    {
        // delete event
        $historicalEvent = HistoricalEvent::findOrFail($id);
        $historicalEvent->historicalPeople()->detach(); // Detach related historical people
        $historicalEvent->delete();
        return redirect()->route('events.index')->with('success', 'Historical event deleted successfully.');
    }
}
