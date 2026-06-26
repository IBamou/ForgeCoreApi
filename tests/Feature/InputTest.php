<?php

use App\Models\Input;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;

uses(RefreshDatabase::class);

beforeEach(function () {
    $this->user = User::factory()->create();
    $this->token = $this->user->createToken('api-token')->plainTextToken;
});

it('lists inputs', function () {
    Input::factory()->count(3)->create(['user_id' => $this->user->id]);

    $response = $this->withToken($this->token)
        ->getJson('/api/v1/inputs');

    $response->assertStatus(200)
        ->assertJsonStructure(['inputs', 'meta']);
});

it('creates an input', function () {
    $response = $this->withToken($this->token)
        ->postJson('/api/v1/inputs/store', [
            'title' => 'Test Input',
            'raw_input' => 'Some raw content here',
        ]);

    $response->assertStatus(201)
        ->assertJsonStructure(['message', 'input']);
});

it('fails to create input with missing fields', function () {
    $response = $this->withToken($this->token)
        ->postJson('/api/v1/inputs/store', []);

    $response->assertStatus(422);
});

it('shows an input', function () {
    $input = Input::factory()->create(['user_id' => $this->user->id]);

    $response = $this->withToken($this->token)
        ->getJson("/api/v1/inputs/{$input->id}");

    $response->assertStatus(200)
        ->assertJsonStructure(['input']);
});

it('updates an input', function () {
    $input = Input::factory()->create(['user_id' => $this->user->id]);

    $response = $this->withToken($this->token)
        ->putJson("/api/v1/inputs/{$input->id}/update", [
            'title' => 'Updated Title',
        ]);

    $response->assertStatus(200)
        ->assertJson(['message' => 'Input updated successfully.']);
});

it('archives and restores an input', function () {
    $input = Input::factory()->create(['user_id' => $this->user->id]);

    $this->withToken($this->token)
        ->deleteJson("/api/v1/inputs/{$input->id}/archive")
        ->assertStatus(200);

    $this->assertSoftDeleted($input);

    $this->withToken($this->token)
        ->postJson("/api/v1/inputs/{$input->id}/restore")
        ->assertStatus(200);

    $this->assertNotSoftDeleted($input);
});

it('prevents access to other users inputs', function () {
    $otherUser = User::factory()->create();
    $input = Input::factory()->create(['user_id' => $otherUser->id]);

    $response = $this->withToken($this->token)
        ->getJson("/api/v1/inputs/{$input->id}");

    $response->assertStatus(403);
});
