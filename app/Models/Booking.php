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
        'company_name',
        'inspiration_websites',
        'notes',
        'budget',
        'currency',
        'country',
        'services',
        'consultation_method',
        'preferred_date',
        'preferred_time',
    ];

    protected $casts = [
        'preferred_date' => 'date',
        'services' => 'array',
    ];
}
