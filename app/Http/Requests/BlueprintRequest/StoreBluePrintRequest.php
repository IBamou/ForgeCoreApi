<?php

namespace App\Http\Requests\Blueprint;

use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;

class StoreBluePrintRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'name' => ['required', 'string', 'max:255'],

            'description' => ['nullable', 'string'],

            'tone' => [
                'required',
                'string',
                'in:professional,casual,technical,educational,persuasive',
            ],

            'target_platform' => [
                'required',
                'string',
            ],

            'max_length' => [
                'required',
                'integer',
                'min:50',
                'max:5000',
            ],

            'structure_rules' => ['nullable', 'array'],
            'structure_rules.*' => ['string', 'max:100'],

            'style_rules' => ['nullable', 'array'],
            'style_rules.*' => ['string', 'max:255'],

            'hashtag_strategy' => ['nullable', 'array'],
            'hashtag_strategy.*' => ['string', 'max:100'],
        ];
    }
}
