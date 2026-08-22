<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\ApiEventController;
use App\Http\Controllers\Api\ApiPeriodController;
use App\Http\Controllers\Api\ApiPersonController;
use App\Http\Controllers\Api\ContactController;

Route::get('/events', [ApiEventController::class, 'index']);
Route::get('/events/{id}', [ApiEventController::class, 'show']);
Route::get('/periods', [ApiPeriodController::class, 'index']);
Route::get('/periods/{id}', [ApiPeriodController::class, 'show']);
Route::get('/people', [ApiPersonController::class, 'index']);
Route::get('/people/{id}', [ApiPersonController::class, 'show']);

Route::post('/contact', [ContactController::class, 'contact']);
Route::post('/support', [ContactController::class, 'support']);
