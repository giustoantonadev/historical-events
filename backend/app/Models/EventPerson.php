<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class EventPerson extends Model
{
    protected $table = 'event_person';
    protected $fillable = ['historical_event_id', 'historical_person_id'];
    public function historicalEvent()
    {
        return $this->belongsTo(HistoricalEvent::class);
    }

    public function historicalPerson()
    {
        return $this->belongsTo(HistoricalPerson::class);
    }
}
