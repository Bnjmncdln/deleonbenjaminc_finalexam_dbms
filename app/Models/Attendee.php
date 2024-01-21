<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use MongoDB\Laravel\Eloquent\Model;

class Attendee extends Model
{
    protected $fillable = ['name', 'email'];
}

