<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class HistoricalEvent extends Model
{
    protected $fillable = [
        'title',
        'description',
        'year',
        'image',
        'period_id',
        'title_it',
        'title_en',
        'title_fr',
        'description_it',
        'description_en',
        'description_fr'
    ];

    public function period(): BelongsTo
    {
        return $this->belongsTo(Period::class);
    }

    public function historicalPeople(): BelongsToMany
    {
        return $this->belongsToMany(HistoricalPerson::class, 'event_person', 'historical_event_id', 'historical_person_id');
    }
}
