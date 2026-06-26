<?php

use App\Enums\PostStatus;
use App\Models\Blueprint;
use App\Models\Input;
use App\Models\Post;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;

uses(RefreshDatabase::class);

beforeEach(function () {
    $this->user = User::factory()->create();
    $this->token = $this->user->createToken('api-token')->plainTextToken;
});

it('lists posts', function () {
    Post::factory()->count(3)->create(['user_id' => $this->user->id]);

    $response = $this->withToken($this->token)
        ->getJson('/api/v1/posts');

    $response->assertStatus(200)
        ->assertJsonStructure(['posts', 'meta']);
});

it('filters posts by search', function () {
    Post::factory()->create(['user_id' => $this->user->id, 'title' => 'Laravel Tips']);
    Post::factory()->create(['user_id' => $this->user->id, 'title' => 'PHP Basics']);

    $response = $this->withToken($this->token)
        ->getJson('/api/v1/posts?search=Laravel');

    $response->assertStatus(200);
    expect($response->json('meta.total'))->toBe(1);
});

it('sorts posts', function () {
    Post::factory()->create(['user_id' => $this->user->id, 'title' => 'A Post']);
    Post::factory()->create(['user_id' => $this->user->id, 'title' => 'B Post']);

    $response = $this->withToken($this->token)
        ->getJson('/api/v1/posts?sort=title&direction=asc');

    $response->assertStatus(200);
    expect($response->json('posts.0.title'))->toBe('A Post');
});

it('creates a post with blueprint and input', function () {
    $blueprint = Blueprint::factory()->create([
        'user_id' => $this->user->id,
        'is_active' => true,
    ]);
    $input = Input::factory()->create([
        'user_id' => $this->user->id,
        'raw_input' => 'Some input',
    ]);

    $response = $this->withToken($this->token)
        ->postJson('/api/v1/posts/store', [
            'title' => 'Test Post',
            'blueprint_id' => $blueprint->id,
            'input_id' => $input->id,
        ]);

    $response->assertStatus(201)
        ->assertJsonStructure(['message', 'post', 'configuration']);
});

it('shows a post', function () {
    $post = Post::factory()->create(['user_id' => $this->user->id]);

    $response = $this->withToken($this->token)
        ->getJson("/api/v1/posts/{$post->id}");

    $response->assertStatus(200)
        ->assertJsonStructure(['post']);
});

it('updates post status', function () {
    $post = Post::factory()->create(['user_id' => $this->user->id]);

    $response = $this->withToken($this->token)
        ->patchJson("/api/v1/posts/{$post->id}/updateStatus", [
            'status' => PostStatus::Posted->value,
        ]);

    $response->assertStatus(200);
});

it('requires status field for updateStatus', function () {
    $post = Post::factory()->create(['user_id' => $this->user->id]);

    $response = $this->withToken($this->token)
        ->patchJson("/api/v1/posts/{$post->id}/updateStatus", []);

    $response->assertStatus(422);
});

it('archives and restores a post', function () {
    $post = Post::factory()->create(['user_id' => $this->user->id]);

    $this->withToken($this->token)
        ->deleteJson("/api/v1/posts/{$post->id}/archive")
        ->assertStatus(200);

    $this->assertSoftDeleted($post);

    $this->withToken($this->token)
        ->postJson("/api/v1/posts/{$post->id}/restore")
        ->assertStatus(200);

    $this->assertNotSoftDeleted($post);
});
