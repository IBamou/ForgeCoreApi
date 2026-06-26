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
}
