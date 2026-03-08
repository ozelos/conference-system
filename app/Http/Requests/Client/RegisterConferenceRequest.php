<?php

namespace App\Http\Requests\Client;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;

class RegisterConferenceRequest extends FormRequest
{
    public function authorize(): bool
    {
        // Kol autentifikacijos nėra – leidžiame visiems
        // Vėliau galima pakeisti į: return Auth::check() && Auth::user()->role === 'client';
        return true;
    }

    public function rules(): array
    {
        return [
            'conference_id' => [
                'required',
                'exists:conferences,id',
                // Papildoma taisyklė: negalima registruotis į jau įvykusią konferenciją
                function ($attribute, $value, $fail) {
                    $conference = \App\Models\Conference::find($value);
                    if ($conference && $conference->is_past) {
                        $fail('Negalima registruotis į jau įvykusią konferenciją.');
                    }
                },
            ],
        ];
    }

    public function messages(): array
    {
        return [
            'conference_id.required' => 'Konferencija nenurodyta.',
            'conference_id.exists'   => 'Tokios konferencijos nėra.',
        ];
    }
}
