<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Booking extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'email',
        'phone',
        'inspiration_websites',
        'notes',
        'budget',
        'currency',
        'consultation_method',
        'preferred_date',
        'preferred_time',
    ];

    protected $casts = [
        'preferred_date' => 'date',
    ];
}
