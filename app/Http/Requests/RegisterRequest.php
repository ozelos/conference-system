<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RegisterRequest extends FormRequest
{
    /**
     * Ar leidžiama naudoti šią formą
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Validacijos taisyklės
     */
    public function rules(): array
    {
        return [
            'name'     => 'required|string|max:255',
            'email'    => 'required|email|unique:users,email',
            'password' => 'required|min:8|confirmed',
        ];
    }
}