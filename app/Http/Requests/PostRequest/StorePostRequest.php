<?php

namespace App\Http\Requests\PostRequest;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class StorePostRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'title' => ['required', 'string'],
            'blueprint_id' => [
                'required',
                Rule::exists('blueprints', 'id')->where(function ($query) {
                    return $query->where('is_active', true)->where('user_id', auth()->id())->whereNull('deleted_at');
                }),
            ],
            'input_id' => [
                'required',
                Rule::exists('inputs', 'id')->where(function ($query) {
                    return $query->whereNotNull('raw_input')->where('user_id', auth()->id())->whereNull('deleted_at');
                }),
            ],
        ];
    }

    public function messages(): array
    {
        return [
            'blueprint_id.exists' => 'The selected blueprint is invalid or not active.',
            'input_id.exists' => 'The selected input is invalid or not available.',
        ];
    }

    public function bodyParameters(): array
    {
        return [
            'title' => [
                'description' => 'The post title.',
                'required' => true,
                'type' => 'string',
                'example' => 'Understanding AI in Healthcare',
            ],
            'blueprint_id' => [
                'description' => 'The ID of an active blueprint belonging to the user.',
                'required' => true,
                'type' => 'integer',
                'example' => 1,
            ],
            'input_id' => [
                'description' => 'The ID of an input belonging to the user.',
                'required' => true,
                'type' => 'integer',
                'example' => 1,
            ],
        ];
    }
}
