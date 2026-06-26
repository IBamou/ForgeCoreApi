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
}
