<?php

namespace App\Http\Requests\PostRequest;

use App\Enums\PostStatus;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UpdatePostStatusRequest extends FormRequest
{
    public function authorize(): bool
    {
        return $this->user()->can('updateStatus', $this->route('post'));
    }

    public function rules(): array
    {
        return [
            'status' => ['required', 'string', Rule::enum(PostStatus::class)],
        ];
    }

    public function messages(): array
    {
        return [
            'status.required' => 'The status field is required.',
            'status.Illuminate\Validation\Rules\Enum' => 'The selected status is invalid.',
        ];
    }

    public function bodyParameters(): array
    {
        return [
            'status' => [
                'description' => 'The new post status. Must be a valid PostStatus enum value.',
                'required' => true,
                'type' => 'string',
                'example' => 'draft',
            ],
        ];
    }
}
