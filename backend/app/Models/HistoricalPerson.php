<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class HistoricalPerson extends Model
{
    protected $fillable = ['name', 'biography', 'portrait', 'birth_year'];



    public function historicalEvents(): BelongsToMany
    {
        return $this->belongsToMany(HistoricalEvent::class, 'event_person', 'historical_person_id', 'historical_event_id')
            ->orderBy('year', 'asc');
    }
}
