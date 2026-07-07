<?php

namespace App\Ai\Tools;

use App\Models\Input;
use Illuminate\Contracts\JsonSchema\JsonSchema;
use Laravel\Ai\Contracts\Tool;
use Laravel\Ai\Tools\Request;
use Stringable;

class ListInputs implements Tool
{
    public function description(): Stringable|string
    {
        return 'List all available inputs with their titles and preview';
    }

    public function handle(Request $request): Stringable|string
    {
        $inputs = Input::orderBy('created_at', 'desc')
            ->get(['id', 'title', 'raw_input', 'created_at']);

        if ($inputs->isEmpty()) {
            return 'No inputs found.';
        }

        return json_encode($inputs->map(fn ($input) => [
            'id' => $input->id,
            'title' => $input->title,
            'preview' => mb_substr($input->raw_input, 0, 200),
            'created_at' => $input->created_at->toDateTimeString(),
        ])->toArray(), JSON_PRETTY_PRINT);
    }

    public function schema(JsonSchema $schema): array
    {
        return [];
    }
}
