<?php

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;

// Add this line to refresh the database for these tests
uses(RefreshDatabase::class);

test('Login success', function () {
    // Arrange
    $user = User::factory()->create();

    // Act
    $response = $this->postJson('/api/v1/login', [
        'email' => $user->email,
        'password' => 'password',
    ]);

    // Assert
    // $response->dump();

    $response->assertJsonStructure([
        'token',
        'user' => [
            'id',
            'name',
            'email',
            'created_at',
        ],
    ])->assertStatus(200);
});

test('Login failed: missing data', function () {
    // Arrange
    $user = User::factory()->create();

    // Act
    $response = $this->postJson('/api/v1/login', [
        'email' => $user->email,
    ]);

    // Assert

    // $response->dump();
    $response->assertJsonStructure([
        'message',
        'errors'
    ])->assertStatus(422);
});


test('Login failed: invalid data', function () {
    // Arrange
    $user = User::factory()->create();

    // Act
    $response = $this->postJson('/api/v1/login', [
        'email' => $user->email,
        'password' => 'password123', // Wrong password
    ]);

    // Assert

    // $response->dump();
    $response->assertJsonStructure([
        'message',
    ])->assertStatus(401);
});
