<?php

namespace App\Ai\Tools;

use App\Models\Post;
use Illuminate\Contracts\JsonSchema\JsonSchema;
use Laravel\Ai\Contracts\Tool;
use Laravel\Ai\Tools\Request;
use Stringable;

class ListPosts implements Tool
{
    public function description(): Stringable|string
    {
        return 'List all posts with their titles, status, and creation date';
    }

    public function handle(Request $request): Stringable|string
    {
        $posts = Post::with('configuration.blueprint')
            ->orderBy('created_at', 'desc')
            ->get();

        if ($posts->isEmpty()) {
            return 'No posts found.';
        }

        return json_encode($posts->map(fn ($post) => [
            'id' => $post->id,
            'title' => $post->title,
            'status' => $post->status->value,
            'process_status' => $post->process_status->value,
            'blueprint' => $post->configuration->blueprint->name ?? null,
            'created_at' => $post->created_at->toDateTimeString(),
        ])->toArray(), JSON_PRETTY_PRINT);
    }

    public function schema(JsonSchema $schema): array
    {
        return [];
    }
}
