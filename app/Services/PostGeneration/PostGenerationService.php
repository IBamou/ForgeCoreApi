<?php

namespace App\Services\PostGeneration;

use App\Ai\Agents\PostGenerationAgent;
use App\DTOs\PostGenerationData;
use App\Enums\ProcessStatus;
use App\Models\Post;
use App\Schemas\PostGenerationSchema;
use App\Services\AiClient;
use Illuminate\Support\Facades\Log;

class PostGenerationService
{
    protected AiClient $client;

    public function __construct()
    {
        $this->client = app(AiClient::class);
    }

    public function generate(Post $post): ?string
    {
        if ($post->process_status !== ProcessStatus::Pending) {
            Log::warning('PostGeneration skipped: status not pending', [
                'post_id' => $post->id,
                'status' => $post->process_status->value,
            ]);
            return null;
        }

        $post->update([
            'process_status' => ProcessStatus::Processing,
        ]);

        $configuration = $post->configuration()
            ->with(['blueprint', 'input'])
            ->first();

        if (! $configuration) {
            throw new \RuntimeException('Configuration not found for post ' . $post->id);
        }

        $configurationData = json_encode(
            PostGenerationData::configurationData($configuration),
            JSON_PRETTY_PRINT
        );

        $agent = new PostGenerationAgent;

        return $this->client->prompt($agent, $configurationData);
    }

    public function validate(?string $data): ?array
    {
        if ($data === null) {
            return null;
        }

        $data = $this->client::parseResponse($data);

        if ($data === null) {
            throw new \RuntimeException('Failed to parse AI response');
        }

        PostGenerationSchema::validate($data);
        return $data;
    }

    public function storeResult(Post $post, array $result): void
    {
        $post->update([
            'process_status' => ProcessStatus::Completed,
            'hook_proposal' => $result['hook_proposal'],
            'body_points' => $result['body_points'],
            'suggested_hashtags' => $result['suggested_hashtags'],
            'technical_readability_score' => $result['technical_readability_score'],
            'tone_compliance_justification' => $result['tone_compliance_justification'],
            'ai_payload' => $result,
        ]);
    }

    public function markAsFailed(Post $post): void
    {
        $post->update([
            'process_status' => ProcessStatus::Failed,
        ]);
    }
}
