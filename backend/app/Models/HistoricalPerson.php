<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
class HistoricalPerson extends Model
{
    protected $fillable = [
        'name',
        'biography',
        'portrait',
        'birth_year',
        'name_it',
        'name_en',
        'name_fr',
        'biography_it',
        'biography_en',
        'biography_fr'
    ];



    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany<\App\Models\HistoricalEvent, $this>
     */
    public function historicalEvents(): BelongsToMany
    {
        return $this->belongsToMany(HistoricalEvent::class, 'event_person', 'historical_person_id', 'historical_event_id')
            ->orderBy('year', 'asc');
    }
}
