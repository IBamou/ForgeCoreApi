<?php

namespace App\Http\Requests\InputRequest;

use Illuminate\Foundation\Http\FormRequest;

class StoreInputRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'title' => ['required', 'string'],
            'raw_input' => ['required', 'string'],
        ];
    }

    public function bodyParameters(): array
    {
        return [
            'title' => [
                'description' => 'A descriptive title for the input.',
                'required' => true,
                'type' => 'string',
                'example' => 'Article about Machine Learning',
            ],
            'raw_input' => [
                'description' => 'The raw content or source material.',
                'required' => true,
                'type' => 'string',
                'example' => 'Machine learning is a subset of artificial intelligence that enables systems to learn and improve from experience...',
            ],
        ];
    }
}
