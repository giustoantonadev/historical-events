<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\HistoricalEvent;

class ApiEventController extends Controller
{
    public function index()
    {
        return HistoricalEvent::with(['period', 'historicalPeople'])
            ->orderBy('year', 'asc')
            ->get();
    }

    public function show($id)
    {
        return HistoricalEvent::with(['period', 'historicalPeople'])
            ->findOrFail($id);
    }
}
