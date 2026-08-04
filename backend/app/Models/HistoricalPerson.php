<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class HistoricalPerson extends Model
{
    protected $fillable = ['name', 'biography', 'portrait'];

    public function historicalEvents()
    {
        return $this->belongsToMany(HistoricalEvent::class, 'event_person', 'historical_person_id', 'historical_event_id');
    }
}
