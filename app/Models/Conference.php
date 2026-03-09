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
     * Automatiškai konvertuoja laukus į Carbon objektus
     * (veikia Laravel 8+ / 9+ / 10+ / 11+ / 12)
     */
    protected $casts = [
        'date' => 'date:Y-m-d',     // arba tiesiog 'date' – Laravel pats konvertuos
        'created_at' => 'datetime',
        'updated_at' => 'datetime',
    ];

    // ALTERNATYVA senesnėms versijoms (jei $casts neveikia)
    // protected $dates = ['date', 'created_at', 'updated_at'];
}
