<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Period extends Model
{
    protected $fillable = [
        'name',
        'start_date',
        'end_date',
        'description',
        'name_it',
        'name_en',
        'name_fr',
        'description_it',
        'description_en',
        'description_fr',
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany<\App\Models\HistoricalEvent, $this>
     */
    public function events(): HasMany
    {
        return $this->hasMany(HistoricalEvent::class)->orderBy('year', 'asc');
    }
}
