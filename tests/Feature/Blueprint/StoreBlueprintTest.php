<?php

use App\Models\Blueprint;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Laravel\Sanctum\Sanctum;

uses(RefreshDatabase::class);

test('Store Blueprint success', function () {
    // Arrange
    $user = User::factory()->create();

    $blueprint = collect(Blueprint::factory()->make()->toArray())
    ->except(['user_id', 'is_active'])
    ->toArray();

    Sanctum::actingAs($user, ['*']);

    // Act
    $response = $this->postJson('/api/v1/blueprints/store', $blueprint);

    // Assert

    // $response->dump();

    $response->assertJsonStructure([
        'message',
        'blueprint'
    ])->assertStatus(201);
});

test('Store Blueprint failed : missing data', function () {
    // Arrange
    $user = User::factory()->create();

    $blueprint = collect(Blueprint::factory()->make()->toArray())
    ->except(['user_id', 'is_active', 'name'])
    ->toArray(); // Missing name

    Sanctum::actingAs($user, ['*']);

    // Act
    $response = $this->postJson('/api/v1/blueprints/store', $blueprint);

    // Assert

    $response->dump();

    $response->assertJsonStructure([
        'message',
        'errors'
    ])->assertStatus(422);
});
