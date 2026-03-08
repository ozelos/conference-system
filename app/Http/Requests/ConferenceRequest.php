<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ConferenceRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true; // Arba tik admin
    }

    public function rules(): array
    {
        return [
            'title' => 'required|string|max:255',
            'description' => 'required',
            'lecturers' => 'required',
            'date' => 'required|date',
            'time' => 'required',
            'location' => 'required',
        ];
    }

    public function messages(): array
    {
        return [
            'title.required' => __('messages.field_required', ['field' => 'Pavadinimas']),
            // Kiti...
        ];
    }
}
