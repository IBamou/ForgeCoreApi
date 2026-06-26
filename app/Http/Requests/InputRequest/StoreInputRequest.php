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
}
