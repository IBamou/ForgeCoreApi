<?php

namespace App\Http\Requests\ConversationRequest;

use Illuminate\Foundation\Http\FormRequest;

class StoreConversationRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'title' => ['required', 'string'],
            'post_id' => ['sometimes', 'integer', 'exists:posts,id'],
        ];
    }

    public function bodyParameters(): array
    {
        return [
            'title' => [
                'description' => 'A title for the conversation.',
                'required' => true,
                'type' => 'string',
                'example' => 'Drafting my AI post',
            ],
            'post_id' => [
                'description' => 'The ID of an associated post (optional).',
                'required' => false,
                'type' => 'integer',
                'example' => 1,
            ],
        ];
    }
}
