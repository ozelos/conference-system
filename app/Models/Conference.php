<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Conference extends Model
{
    use HasFactory;

    protected $fillable = [
        'title', 'description', 'lecturers', 'date', 'time', 'location', 'is_past'
    ];

    /**
     * Automatiškai konvertuoja šiuos laukus į Carbon objektus
     */
    protected $dates = [
        'date',          // dabar $conference->date bus Carbon objektas
        'created_at',
        'updated_at',
    ];
}
