<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Period;

class ApiPeriodController extends Controller
{
    public function index()
    {
        return Period::all();
    }

    public function show($id)
    {
        return Period::with('historicalEvents')->findOrFail($id);
    }
}
