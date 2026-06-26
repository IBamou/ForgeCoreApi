<?php

namespace App\Http\Requests\InputRequest;

use Illuminate\Foundation\Http\FormRequest;

class UpdateInputRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'title' => ['sometimes', 'string'],
            'raw_input' => ['sometimes', 'string'],
        ];
    }

    public function bodyParameters(): array
    {
        return [
            'title' => [
                'description' => 'The input title.',
                'required' => false,
                'type' => 'string',
                'example' => 'Updated ML Article',
            ],
            'raw_input' => [
                'description' => 'The raw content or source material.',
                'required' => false,
                'type' => 'string',
                'example' => 'Updated content about machine learning techniques...',
            ],
        ];
    }
}
