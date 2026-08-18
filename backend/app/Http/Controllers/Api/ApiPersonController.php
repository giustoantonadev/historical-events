<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\HistoricalPerson;    
class ApiPersonController extends Controller
{
    public function index()
    {
        return HistoricalPerson::with(['historicalEvents'])
            ->orderBy('year', 'asc')
            ->get();
    }
    public function show($id)
    {
        return HistoricalPerson::with(['historicalEvents'])
            ->findOrFail($id);
    }
}
