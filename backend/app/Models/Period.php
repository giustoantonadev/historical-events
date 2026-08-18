<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\HistoricalEvent;

class Period extends Model
{
    protected $fillable = ['name', 'start_date', 'end_date', 'description'];

    public function events()
    {
        return $this->hasMany(HistoricalEvent::class)->orderBy('year', 'asc');
    }
}
