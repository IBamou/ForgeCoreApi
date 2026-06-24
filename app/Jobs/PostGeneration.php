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
            Log::error('PostGeneration failed', [
                'post_id' => $this->post->id,
                'error' => $e->getMessage(),
            ]);

            $generationService->markAsFailed($this->post);
        }
    }
}
