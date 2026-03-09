<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Conference extends Model
{
    use HasFactory;

    /**
     * Laukai, kuriuos leidžiama masiškai priskirti (mass assignment)
     */
    protected $fillable = [
        'title',
        'description',
        'lecturers',
        'date',
        'time',
        'location',
        'is_past',  // jei naudoji šį lauką
    ];

    // Jei turi ryšius (registrations), pridėk čia
    public function registrations()
    {
        return $this->hasMany(Registration::class);
    }
}
