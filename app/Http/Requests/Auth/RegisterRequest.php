<?php

namespace App\Http\Requests\Auth;

use Illuminate\Foundation\Http\FormRequest;

class RegisterRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'name' => ['required', 'string'],
            'email' => ['required', 'email', 'unique:users,email'],
            'password' => ['required', 'string'],
        ];
    }

    public function messages(): array
    {
        return [
            'email.unique' => 'This email is already registered.',
        ];
    }

    public function bodyParameters(): array
    {
        return [
            'name' => [
                'description' => 'The user\'s full name.',
                'required' => true,
                'type' => 'string',
                'example' => 'John Doe',
            ],
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
