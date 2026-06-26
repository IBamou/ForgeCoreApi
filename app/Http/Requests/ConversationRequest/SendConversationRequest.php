<?php

namespace App\Http\Requests\ConversationRequest;

use Illuminate\Foundation\Http\FormRequest;

class SendConversationRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'content' => ['required', 'string'],
        ];
    }

    public function bodyParameters(): array
    {
        return [
            'content' => [
                'description' => 'The message content to send to the AI assistant.',
                'required' => true,
                'type' => 'string',
                'example' => 'Can you help me improve the hook of my post?',
            ],
        ];
    }
}
