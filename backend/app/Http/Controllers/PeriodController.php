<?php

namespace App\Http\Controllers;

use App\Http\Requests\StorePeriodRequest;
use App\Http\Requests\UpdatePeriodRequest;
use App\Models\Period;

class PeriodController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(): \Illuminate\Contracts\View\View
    {
        $periods = Period::orderBy('start_date', 'asc')->get();
        return view('period.index', compact('periods'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): \Illuminate\Contracts\View\View
    {
        return view('period.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StorePeriodRequest $request): \Illuminate\Http\RedirectResponse
    {
        Period::create([
            'name'        => $request->name,
            'start_date'  => $request->start_date,
            'end_date'    => $request->end_date,
            'description' => $request->description,
        ]);

        return redirect()->route('periods.index')
            ->with('success', 'Periodo creato con successo.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id): \Illuminate\Contracts\View\View
    {
        $period = Period::with('events')->findOrFail($id);
        return view('period.show', compact('period'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Period $period): \Illuminate\Contracts\View\View
    {
        return view('period.edit', compact('period'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdatePeriodRequest $request, Period $period): \Illuminate\Http\RedirectResponse
    {
        $period->update([
            'name'        => $request->name,
            'start_date'  => $request->start_date,
            'end_date'    => $request->end_date,
            'description' => $request->description,
        ]);

        return redirect()->route('periods.index')
            ->with('success', 'Periodo aggiornato con successo.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Period $period): \Illuminate\Http\RedirectResponse
    {
        $period->delete();
        return redirect()->route('periods.index')
            ->with('success', 'Periodo eliminato con successo.');
    }
}
