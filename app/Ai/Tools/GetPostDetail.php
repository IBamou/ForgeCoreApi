<?php

namespace App\Ai\Tools;

use App\Models\Post;
use Illuminate\Contracts\JsonSchema\JsonSchema;
use Laravel\Ai\Contracts\Tool;
use Laravel\Ai\Tools\Request;
use Stringable;

class GetPostDetail implements Tool
{
    public function description(): Stringable|string
    {
        return 'Get full post information by post ID';
    }

    public function handle(Request $request): Stringable|string
    {
        $postId = $request['post_id'] ?? null;

        if (! $postId) {
            return 'Post ID is required.';
        }

        $post = Post::with(['configuration.blueprint', 'configuration.input'])->find($postId);

        if (! $post) {
            return 'Post not found.';
        }

        return json_encode([
            'title' => $post->title,
            'hook_proposal' => $post->hook_proposal,
            'body_points' => $post->body_points,
            'suggested_hashtags' => $post->suggested_hashtags,
            'technical_readability_score' => $post->technical_readability_score,
            'tone_compliance_justification' => $post->tone_compliance_justification,
            'configuration' => [
                'blueprint' => [
                    'name' => $post->configuration->blueprint->name ?? null,
                    'tone' => $post->configuration->blueprint->tone ?? null,
                    'target_platform' => $post->configuration->blueprint->target_platform ?? null,
                    'max_length' => $post->configuration->blueprint->max_length ?? null,
                    'structure_rules' => $post->configuration->blueprint->structure_rules ?? null,
                    'style_rules' => $post->configuration->blueprint->style_rules ?? null,
                ],
                'input' => [
                    'title' => $post->configuration->input->title ?? null,
                    'raw_input' => $post->configuration->input->raw_input ?? null,
                ],
            ],
        ], JSON_PRETTY_PRINT);
    }

    public function schema(JsonSchema $schema): array
    {
        return [
            'post_id' => $schema
                ->integer()
                ->description('The ID of the post.')
                ->required(),
        ];
    }
}
