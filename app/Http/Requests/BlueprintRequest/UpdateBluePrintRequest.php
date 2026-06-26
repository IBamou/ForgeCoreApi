<?php

namespace App\Http\Requests\BlueprintRequest;

use Illuminate\Foundation\Http\FormRequest;

class UpdateBluePrintRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'name' => ['sometimes', 'string', 'max:255'],

            'description' => ['sometimes', 'nullable', 'string'],

            'tone' => ['sometimes', 'string', 'max:50'],

            'target_platform' => [
                'sometimes',
                'string',
                'in:x,linkedin',
            ],

            'max_length' => [
                'sometimes',
                'integer',
                'min:50',
                'max:5000',
            ],

            'structure_rules' => ['sometimes', 'nullable', 'array'],
            'structure_rules.*' => ['string', 'max:100'],

            'style_rules' => ['sometimes', 'nullable', 'array'],
            'style_rules.*' => ['string', 'max:255'],

            'hashtag_strategy' => ['sometimes', 'nullable', 'array'],
            'hashtag_strategy.*' => ['string', 'max:100'],
        ];
    }

    public function bodyParameters(): array
    {
        return [
            'name' => [
                'description' => 'The blueprint name.',
                'required' => false,
                'type' => 'string',
                'example' => 'Updated Tech Blueprint',
            ],
            'description' => [
                'description' => 'The blueprint description.',
                'required' => false,
                'type' => 'string',
                'example' => 'Updated description for the blueprint.',
            ],
            'tone' => [
                'description' => 'The writing tone.',
                'required' => false,
                'type' => 'string',
                'example' => 'professional',
            ],
            'target_platform' => [
                'description' => 'The target platform.',
                'required' => false,
                'type' => 'string',
                'example' => 'x',
            ],
            'max_length' => [
                'description' => 'Maximum post length.',
                'required' => false,
                'type' => 'integer',
                'example' => 2000,
            ],
            'structure_rules' => [
                'description' => 'Array of structural rules.',
                'required' => false,
                'type' => 'string[]',
                'example' => ['Start with a hook', 'Include data or stats'],
            ],
            'style_rules' => [
                'description' => 'Array of style guidelines.',
                'required' => false,
                'type' => 'string[]',
                'example' => ['Use active voice', 'Keep paragraphs short'],
            ],
            'hashtag_strategy' => [
                'description' => 'Array of hashtag strategy instructions.',
                'required' => false,
                'type' => 'string[]',
                'example' => ['Use 3-5 hashtags', 'Include branded hashtag'],
            ],
        ];
    }
}
