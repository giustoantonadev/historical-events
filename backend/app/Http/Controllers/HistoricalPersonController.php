<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreHistoricalPersonRequest;
use App\Http\Requests\UpdateHistoricalPersonRequest;
use App\Models\HistoricalPerson;

class HistoricalPersonController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(): \Illuminate\Contracts\View\View
    {
        $historicalPeople = HistoricalPerson::orderBy('birth_year', 'asc')->get();
        return view('historical_person.index', compact('historicalPeople'));
    }

    public function create(): \Illuminate\Contracts\View\View
    {
        return view('historical_person.create');
    }

    public function store(StoreHistoricalPersonRequest $request): \Illuminate\Http\RedirectResponse
    {
        $data = $request->validated();

        if ($request->hasFile('portrait')) {
            $path = $request->file('portrait')->store('portraits', 'public');
            if (is_string($path)) {
                $data['portrait'] = $path;
            }
        }

        HistoricalPerson::create($data);

        return redirect()->route('historical-people.index')
            ->with('success', 'Historical person created successfully.');
    }

    public function show(string $id): \Illuminate\Contracts\View\View
    {
        $historicalPerson = HistoricalPerson::with('historicalEvents')->findOrFail($id);
        return view('historical_person.show', compact('historicalPerson'));
    }

    public function edit(string $id): \Illuminate\Contracts\View\View
    {
        $historicalPerson = HistoricalPerson::findOrFail($id);
        return view('historical_person.edit', compact('historicalPerson'));
    }

    public function update(UpdateHistoricalPersonRequest $request, string $id): \Illuminate\Http\RedirectResponse
    {
        $historicalPerson = HistoricalPerson::findOrFail($id);

        $data = $request->validated();

        if ($request->hasFile('portrait')) {
            $path = $request->file('portrait')->store('portraits', 'public');
            if (is_string($path)) {
                $data['portrait'] = $path;
            }
        }

        $historicalPerson->update($data);

        return redirect()->route('historical-people.index')
            ->with('success', 'Historical person updated successfully.');
    }

    public function destroy(string $id): \Illuminate\Http\RedirectResponse
    {
        $historicalPerson = HistoricalPerson::findOrFail($id);
        $historicalPerson->delete();

        return redirect()->route('historical-people.index')
            ->with('success', 'Historical person deleted successfully.');
    }
}