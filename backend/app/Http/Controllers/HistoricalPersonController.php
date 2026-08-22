<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
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

    public function store(Request $request): \Illuminate\Http\RedirectResponse
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'biography' => 'nullable|string',
            'birth_year' => 'nullable|integer',
            'portrait' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $historicalPerson = new HistoricalPerson();
        $historicalPerson->name = $request->input('name');
        $historicalPerson->biography = $request->input('biography');
        $historicalPerson->birth_year = $request->input('birth_year');
        if ($request->hasFile('portrait')) {
            $path = $request->file('portrait')->store('portraits', 'public');
            if (is_string($path)) {
                $historicalPerson->portrait = $path;
            }
        }

        $historicalPerson->save();

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

    public function update(Request $request, string $id): \Illuminate\Http\RedirectResponse
    {
        $historicalPerson = HistoricalPerson::findOrFail($id);

        $data = $request->validate([
            'name' => 'required|string|max:255',
            'biography' => 'nullable|string',
            'birth_year' => 'nullable|integer',
            'portrait' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

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
