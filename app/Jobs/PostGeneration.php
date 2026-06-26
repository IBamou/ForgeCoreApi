<?php

namespace App\Jobs;

use App\Models\Post;
use App\Services\PostGeneration\PostGenerationService;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Queue\Queueable;
use Illuminate\Support\Facades\Log;

class PostGeneration implements ShouldQueue
{
    use Queueable;

    public $tries = 3;

    public $backoff = [30, 120, 300];

    public function __construct(public Post $post) {}

    public function handle(): void
    {
        $generationService = app(PostGenerationService::class);

        try {
            $response = $generationService->generate($this->post);
            $response = $generationService->validate($response);
            if ($response) {
                $generationService->storeResult($this->post, $response);
            }
        } catch (\Throwable $e) {
            $isRateLimit = $e->getCode() === 429;

            Log::error('PostGeneration failed', [
                'post_id' => $this->post->id,
                'is_rate_limit' => $isRateLimit,
                'attempt' => $this->attempts(),
                'error' => $e->getMessage(),
            ]);

            $generationService->markAsFailed($this->post);

            if ($isRateLimit && $this->attempts() < $this->tries) {
                $this->release($this->backoff[$this->attempts() - 1] ?? 300);
            }
        }
    }

    public function failed(\Throwable $e): void
    {
        Log::error('PostGeneration exhausted all retries', [
            'post_id' => $this->post->id,
            'error' => $e->getMessage(),
        ]);

        app(PostGenerationService::class)->markAsFailed($this->post);
    }
}
