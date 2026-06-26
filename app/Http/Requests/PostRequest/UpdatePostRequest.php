<?php

namespace App\Http\Requests\PostRequest;

use App\Enums\PostStatus;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UpdatePostRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'title' => ['sometimes', 'string'],
            'hook_proposal' => ['sometimes', 'nullable', 'string', 'max:500'],

            'body_points' => ['sometimes', 'nullable', 'array'],
            'body_points.*' => ['string', 'max:1000'],

            'suggested_hashtags' => ['sometimes', 'nullable', 'array'],
            'suggested_hashtags.*' => ['string', 'max:50'],

            'technical_readability_score' => [
                'sometimes',
                'nullable',
                'integer',
                'min:0',
                'max:100',
            ],

            'tone_compliance_justification' => [
                'sometimes',
                'nullable',
                'string',
            ],

            'status' => [
                'sometimes',
                'string',
                Rule::enum(PostStatus::class),
            ],
        ];
    }

    public function bodyParameters(): array
    {
        return [
            'title' => [
                'description' => 'The post title.',
                'required' => false,
                'type' => 'string',
                'example' => 'The Future of AI in Healthcare',
            ],
            'hook_proposal' => [
                'description' => 'A hook or opening line for the post.',
                'required' => false,
                'type' => 'string',
                'example' => 'Did you know AI can detect diseases earlier than doctors?',
            ],
            'body_points' => [
                'description' => 'Array of key points to include in the post body.',
                'required' => false,
                'type' => 'string[]',
                'example' => ['AI improves diagnosis accuracy', 'AI reduces costs', 'AI enables personalized treatment'],
            ],
            'suggested_hashtags' => [
                'description' => 'Array of suggested hashtags.',
                'required' => false,
                'type' => 'string[]',
                'example' => ['#AI', '#Healthcare', '#Tech'],
            ],
            'technical_readability_score' => [
                'description' => 'A score from 0 to 100 indicating technical complexity.',
                'required' => false,
                'type' => 'integer',
                'example' => 65,
            ],
            'tone_compliance_justification' => [
                'description' => 'Explanation of how the post complies with the blueprint tone.',
                'required' => false,
                'type' => 'string',
                'example' => 'The post uses professional language with technical depth as required.',
            ],
            'status' => [
                'description' => 'The post status.',
                'required' => false,
                'type' => 'string',
                'example' => 'draft',
            ],
        ];
    }
}
