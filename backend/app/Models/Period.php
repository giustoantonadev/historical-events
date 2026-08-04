<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Period extends Model
{
    protected $fillable = ['name', 'description'];

    public function historicalEvents()
    {
        return $this->hasMany(HistoricalEvent::class);
    }
}
