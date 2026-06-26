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
}
