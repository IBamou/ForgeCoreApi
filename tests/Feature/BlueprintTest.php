<?php

use App\Models\Blueprint;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;

uses(RefreshDatabase::class);

beforeEach(function () {
    $this->user = User::factory()->create();
    $this->token = $this->user->createToken('api-token')->plainTextToken;
});

it('lists blueprints', function () {
    Blueprint::factory()->count(3)->create(['user_id' => $this->user->id]);

    $response = $this->withToken($this->token)
        ->getJson('/api/v1/blueprints');

    $response->assertStatus(200)
        ->assertJsonStructure(['blueprints', 'meta']);
});

it('creates a blueprint', function () {
    $response = $this->withToken($this->token)
        ->postJson('/api/v1/blueprints/store', [
            'name' => 'Tech Blog Post',
            'description' => 'For technical blog content',
            'tone' => 'professional',
            'target_platform' => 'linkedin',
            'max_length' => 1000,
        ]);

    $response->assertStatus(201)
        ->assertJsonStructure(['message', 'blueprint']);
});

it('shows a blueprint', function () {
    $blueprint = Blueprint::factory()->create(['user_id' => $this->user->id]);

    $response = $this->withToken($this->token)
        ->getJson("/api/v1/blueprints/{$blueprint->id}");

    $response->assertStatus(200)
        ->assertJsonStructure(['blueprint']);
});

it('archives and restores a blueprint', function () {
    $blueprint = Blueprint::factory()->create(['user_id' => $this->user->id]);

    $this->withToken($this->token)
        ->deleteJson("/api/v1/blueprints/{$blueprint->id}/archive")
        ->assertStatus(200);

    $this->assertSoftDeleted($blueprint);

    $this->withToken($this->token)
        ->postJson("/api/v1/blueprints/{$blueprint->id}/restore")
        ->assertStatus(200);

    $this->assertNotSoftDeleted($blueprint);
});

it('prevents access to other users blueprints', function () {
    $otherUser = User::factory()->create();
    $blueprint = Blueprint::factory()->create(['user_id' => $otherUser->id]);

    $response = $this->withToken($this->token)
        ->getJson("/api/v1/blueprints/{$blueprint->id}");

    $response->assertStatus(403);
});
