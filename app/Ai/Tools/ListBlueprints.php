<?php

namespace App\Ai\Tools;

use App\Models\Blueprint;
use Illuminate\Contracts\JsonSchema\JsonSchema;
use Laravel\Ai\Contracts\Tool;
use Laravel\Ai\Tools\Request;
use Stringable;

class ListBlueprints implements Tool
{
    public function description(): Stringable|string
    {
        return 'List all available blueprints with their details';
    }

    public function handle(Request $request): Stringable|string
    {
        $blueprints = Blueprint::where('is_active', true)
            ->orderBy('name')
            ->get(['id', 'name', 'description', 'tone', 'target_platform', 'max_length']);

        if ($blueprints->isEmpty()) {
            return 'No blueprints found.';
        }

        return json_encode($blueprints->toArray(), JSON_PRETTY_PRINT);
    }

    public function schema(JsonSchema $schema): array
    {
        return [];
    }
}
