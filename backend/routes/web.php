<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HistoricalPersonController;
use App\Http\Controllers\PeriodController;
use App\Http\Controllers\HistoricalEventController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::middleware('auth')->group(function () {
    Route::resource('historical-people', HistoricalPersonController::class);
    Route::resource('periods', PeriodController::class);
    Route::resource('events', HistoricalEventController::class);

    // Admin messages
    Route::get('admin/messages', [\App\Http\Controllers\Admin\MessageController::class, 'index'])->name('admin.messages.index');
    Route::get('admin/messages/{id}', [\App\Http\Controllers\Admin\MessageController::class, 'show'])->name('admin.messages.show');
    Route::delete('admin/messages/{id}', [\App\Http\Controllers\Admin\MessageController::class, 'destroy'])->name('admin.messages.destroy');
});

require __DIR__ . '/auth.php';
