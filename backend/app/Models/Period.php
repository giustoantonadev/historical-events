<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Period extends Model
{
    protected $fillable = ['name', 'start_date', 'end_date', 'description'];

    public function historicalEvents()
    {
        return $this->hasMany(HistoricalEvent::class)->orderBy('year', 'asc');
    }
}
