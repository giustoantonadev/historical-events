<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\HistoricalPerson;

class HistoricalPersonController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $historicalPeople = HistoricalPerson::all();
        return view('historical-people.index', compact('historicalPeople'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('historical-people.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'biography' => 'nullable|string',
            'portrait' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $historicalPerson = new HistoricalPerson();
        $historicalPerson->name = $request->input('name');
        $historicalPerson->biography = $request->input('biography');
        if ($request->hasFile('portrait')) {
            $historicalPerson->portrait = $request->file('portrait')->store('portraits', 'public');
        }
        $historicalPerson->save();

        return redirect()->route('historical-people.index')->with('success', 'Historical person created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $historicalPerson = HistoricalPerson::with('historicalEvents')->findOrFail($id);
        return view('historical-people.show', compact('historicalPerson'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $historicalPerson = HistoricalPerson::findOrFail($id);
        return view('historical-people.edit', compact('historicalPerson'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $historicalPerson = HistoricalPerson::findOrFail($id);

        $data = $request->validate([
            'name' => 'required|string|max:255',
            'biography' => 'nullable|string',
            'portrait' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        if ($request->hasFile('portrait')) {
            $data['portrait'] = $request->file('portrait')->store('portraits', 'public');
        }

        $historicalPerson->update($data);

        return redirect()->route('historical-people.index')->with('success', 'Historical person updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $historicalPerson = HistoricalPerson::findOrFail($id);
        $historicalPerson->delete();
        return redirect()->route('historical-people.index')->with('success', 'Historical person deleted successfully.');
    }
}
