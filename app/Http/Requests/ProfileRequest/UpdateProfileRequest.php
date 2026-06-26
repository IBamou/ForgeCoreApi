<?php

namespace App\Http\Requests\ProfileRequest;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UpdateProfileRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'name' => ['sometimes', 'string', 'max:255'],
            'email' => ['sometimes', 'email', 'max:255', Rule::unique('users')->ignore($this->user()->id)],
            'current_password' => ['required_with:password', 'string'],
            'password' => ['sometimes', 'string', 'min:8', 'confirmed'],
        ];
    }

    public function messages(): array
    {
        return [
            'email.unique' => 'This email is already taken.',
            'password.confirmed' => 'The password confirmation does not match.',
            'password.min' => 'Password must be at least 8 characters.',
        ];
    }

    public function bodyParameters(): array
    {
        return [
            'name' => [
                'description' => 'The user\'s full name.',
                'required' => false,
                'type' => 'string',
                'example' => 'John Updated',
            ],
            'email' => [
                'description' => 'The user\'s email address.',
                'required' => false,
                'type' => 'string',
                'example' => 'john.updated@example.com',
            ],
            'current_password' => [
                'description' => 'Required when changing the password. Must match the current password.',
                'required' => false,
                'type' => 'string',
                'example' => 'current-secret',
            ],
            'password' => [
                'description' => 'The new password (min 8 characters).',
                'required' => false,
                'type' => 'string',
                'example' => 'new-secret-123',
            ],
            'password_confirmation' => [
                'description' => 'Must match the new password.',
                'required' => false,
                'type' => 'string',
                'example' => 'new-secret-123',
            ],
        ];
    }
}
