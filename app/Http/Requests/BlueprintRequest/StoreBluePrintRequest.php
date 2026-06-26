<?php

namespace App\Http\Requests\BlueprintRequest;

use Illuminate\Foundation\Http\FormRequest;

class StoreBluePrintRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

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
                'in:x,linkedin',
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

    public function bodyParameters(): array
    {
        return [
            'name' => [
                'description' => 'A name for the blueprint.',
                'required' => true,
                'type' => 'string',
                'example' => 'Tech Thought Leadership',
            ],
            'description' => [
                'description' => 'An optional description of the blueprint.',
                'required' => false,
                'type' => 'string',
                'example' => 'Blueprint for technical thought leadership posts on LinkedIn.',
            ],
            'tone' => [
                'description' => 'The writing tone.',
                'required' => true,
                'type' => 'string',
                'example' => 'technical',
            ],
            'target_platform' => [
                'description' => 'The target social media platform.',
                'required' => true,
                'type' => 'string',
                'example' => 'linkedin',
            ],
            'max_length' => [
                'description' => 'Maximum post length in characters.',
                'required' => true,
                'type' => 'integer',
                'example' => 1500,
            ],
            'structure_rules' => [
                'description' => 'Array of structural rules (e.g., hook, body, CTA).',
                'required' => false,
                'type' => 'string[]',
                'example' => ['Start with a hook', 'Include a personal story', 'End with a question'],
            ],
            'style_rules' => [
                'description' => 'Array of style guidelines.',
                'required' => false,
                'type' => 'string[]',
                'example' => ['Use active voice', 'Keep sentences short', 'Avoid jargon'],
            ],
            'hashtag_strategy' => [
                'description' => 'Array of hashtag strategy instructions.',
                'required' => false,
                'type' => 'string[]',
                'example' => ['Use 3-5 hashtags', 'Mix broad and niche tags'],
            ],
        ];
    }
}
