<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class HistoricalEvent extends Model
{
    protected $fillable = ['title', 'description', 'year', 'image', 'period_id', 'historical_person_id'];

    public function period()
    {
        return $this->belongsTo(Period::class);
    }

    public function historicalPerson()
    {
        return $this->belongsToMany(HistoricalPerson::class, 'event_person', 'historical_event_id', 'historical_person_id');
    }
}
