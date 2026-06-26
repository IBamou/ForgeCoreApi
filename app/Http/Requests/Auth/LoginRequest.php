<?php

namespace App\Http\Requests\Auth;

use Illuminate\Foundation\Http\FormRequest;

class LoginRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'email' => ['required', 'email'],
            'password' => ['required', 'string'],
        ];
    }

    public function bodyParameters(): array
    {
        return [
            'email' => [
                'description' => 'The user\'s email address.',
                'required' => true,
                'type' => 'string',
                'example' => 'john@example.com',
            ],
            'password' => [
                'description' => 'The user\'s password.',
                'required' => true,
                'type' => 'string',
                'example' => 'secret123',
            ],
        ];
    }
}
