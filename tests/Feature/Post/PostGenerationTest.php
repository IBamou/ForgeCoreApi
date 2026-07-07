<?php

use App\Ai\Agents\PostGenerationAgent;
use App\Enums\PostStatus;
use App\Enums\ProcessStatus;
use App\Jobs\PostGeneration;
use App\Models\Blueprint;
use App\Models\Configuration;
use App\Models\Input;
use App\Models\Post;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Queue;
use Laravel\Sanctum\Sanctum;

uses(RefreshDatabase::class);

test('dispatches PostGeneration job when a post is created', function () {
    Queue::fake();

    $user = User::factory()->create();
    Sanctum::actingAs($user, ['*']);

    $blueprint = Blueprint::factory()->create(['user_id' => $user->id]);
    $input = Input::factory()->create(['user_id' => $user->id]);

    $this->postJson('/api/v1/posts/store', [
        'title' => 'Laravel Queue Workers',
        'blueprint_id' => $blueprint->id,
        'input_id' => $input->id,
    ])->assertStatus(201);

    Queue::assertPushed(PostGeneration::class, function (PostGeneration $job) {
        return $job->post->title === 'Laravel Queue Workers';
    });
});

test('job successfully generates a post from a blueprint and input using groq', function () {
    $user = User::factory()->create();
    Sanctum::actingAs($user, ['*']);

    $blueprint = Blueprint::factory()->create(['user_id' => $user->id]);
    $input = Input::factory()->create(['user_id' => $user->id]);

    PostGenerationAgent::fake([
        [
            'schema_version' => 1,
            'hook_proposal' => 'Most Laravel devs run queue workers wrong. Here\'s how to stop debugging at 2 AM.',
            'body_points' => [
                'Never run php artisan queue:work without --queue. You\'ll process jobs from the wrong channel.',
                'Set --tries=3 and --backoff=30. Failed jobs shouldn\'t retry instantly — give your DB a breather.',
                'Use Supervisor with autorestart=true. Your worker will crash eventually. Plan for it.',
                'Memory leaks? Restart workers after 100 jobs with --max-jobs=100.',
                'Stale DB connections happen. Set PDO::ATTR_PERSISTENT or use a connection pooler.',
            ],
            'suggested_hashtags' => ['LaravelTips', 'PHP', 'DevOps'],
            'technical_readability_score' => 72,
            'tone_compliance_justification' => 'Conversational tone with short, punchy sentences matches the blueprint\'s \'conversational, confident\' directive.',
        ],
    ]);

    $post = DB::transaction(function () use ($user, $blueprint, $input) {
        $configuration = Configuration::firstOrCreate([
            'blueprint_id' => $blueprint->id,
            'input_id' => $input->id,
            'user_id' => $user->id,
        ]);

        $post = Post::create([
            'user_id' => $user->id,
            'title' => 'Laravel Queue Workers Deep Dive',
            'configuration_id' => $configuration->id,
            'process_status' => ProcessStatus::Pending,
            'status' => PostStatus::InReview,
        ]);

        $configuration->load(['blueprint', 'input']);

        dispatch_sync(new PostGeneration($post));

        return $post;
    });

    $post->refresh();

    expect($post->process_status)->toBe(ProcessStatus::Completed);
    expect($post->hook_proposal)->toBe("Most Laravel devs run queue workers wrong. Here's how to stop debugging at 2 AM.");
    expect($post->body_points)->toBeArray()->toHaveCount(5);
    expect($post->suggested_hashtags)->toBe(['LaravelTips', 'PHP', 'DevOps']);
    expect($post->technical_readability_score)->toBe(72);
    expect($post->tone_compliance_justification)->not->toBeEmpty();
    expect($post->ai_payload)->toBeArray()->toHaveKey('hook_proposal');

    PostGenerationAgent::assertPrompted(function ($prompt): bool {
        return str_contains($prompt->prompt, 'blueprint')
            && str_contains($prompt->prompt, 'input');
    });
});
