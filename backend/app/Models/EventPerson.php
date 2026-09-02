<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class EventPerson extends Model
{
    protected $table = 'event_person';
    protected $fillable = ['historical_event_id', 'historical_person_id'];

    public function historicalEvent(): BelongsTo
    {
        return $this->belongsTo(HistoricalEvent::class);
    }

    public function historicalPerson(): BelongsTo
    {
        return $this->belongsTo(HistoricalPerson::class);
    }
}
