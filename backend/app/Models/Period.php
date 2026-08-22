<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Period extends Model
{
    protected $fillable = ['name', 'start_date', 'end_date', 'description'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany<\App\Models\HistoricalEvent, $this>
     */
    public function events(): HasMany
    {
        return $this->hasMany(HistoricalEvent::class)->orderBy('year', 'asc');
    }
}
