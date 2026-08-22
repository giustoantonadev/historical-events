<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Message extends Model
{
    protected $fillable = [
        'type',
        'name',
        'email',
        'subject',
        'message',
        'issue_type',
        'priority',
        'steps',
        'attachment'
    ];
}
