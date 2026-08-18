<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Period; 
class ApiPeriodController extends Controller
{
    public function index()
    {
        return Period::orderBy('start_year', 'asc')->get();
    }

    public function show($id)
    {
        return Period::findOrFail($id);
    }
}
