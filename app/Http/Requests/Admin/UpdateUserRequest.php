<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UpdateUserRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true; // Vėliau: return auth()->user()->role === 'admin';
    }

    public function rules(): array
    {
        return [
            'name' => [
                'required',
                'string',
                'min:3',
                'max:255',
            ],
            'email' => [
                'sometimes',
                'nullable',
                'email',
                Rule::unique('users')->ignore($this->user->id),
            ],
            'role' => [
                'required',
                'in:client,employee,admin',
            ],
            // Jei nori leisti keisti slaptažodį (nebūtina pagal užduotį)
            'password' => [
                'nullable',
                'string',
                'min:8',
                'confirmed',
            ],
        ];
    }

    public function messages(): array
    {
        return [
            'name.required'     => 'Vardas ir pavardė yra privalomi.',
            'name.min'          => 'Vardas turi būti bent 3 simboliai.',
            'email.email'       => 'Neteisingas el. pašto formatas.',
            'email.unique'      => 'Toks el. paštas jau naudojamas.',
            'role.in'           => 'Pasirinkta neteisinga rolė.',
            'password.min'      => 'Slaptažodis turi būti bent 8 simboliai.',
            'password.confirmed'=> 'Slaptažodžiai nesutampa.',
        ];
    }
}
