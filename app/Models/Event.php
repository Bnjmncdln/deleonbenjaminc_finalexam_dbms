<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use MongoDB\Laravel\Eloquent\Model;

class Event extends Model
{
    protected $fillable = ['name', 'date', 'location', 'attendees'];

    public function attendees()
    {
        return $this->hasMany(Attendee::class);
    }
}

