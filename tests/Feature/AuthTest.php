<?php

use App\Models\User;
use Illuminate\Auth\Notifications\ResetPassword;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Notification;

uses(RefreshDatabase::class);

it('registers a user', function () {
    $response = $this->postJson('/api/v1/register', [
        'name' => 'John Doe',
        'email' => 'john@example.com',
        'password' => 'password123',
        'password_confirmation' => 'password123',
    ]);

    $response->assertStatus(201)
        ->assertJsonStructure(['token', 'user']);
});

it('fails registration with invalid data', function () {
    $response = $this->postJson('/api/v1/register', [
        'name' => '',
        'email' => 'not-an-email',
        'password' => 'short',
    ]);

    $response->assertStatus(422);
});

it('logs in a user', function () {
    $user = User::factory()->create([
        'email' => 'john@example.com',
        'password' => Hash::make('password123'),
    ]);

    $response = $this->postJson('/api/v1/login', [
        'email' => 'john@example.com',
        'password' => 'password123',
    ]);

    $response->assertStatus(200)
        ->assertJsonStructure(['token', 'user']);
});

it('fails login with invalid credentials', function () {
    $response = $this->postJson('/api/v1/login', [
        'email' => 'john@example.com',
        'password' => 'wrong-password',
    ]);

    $response->assertStatus(401);
});

it('logs out a user', function () {
    $user = User::factory()->create();
    $token = $user->createToken('api-token')->plainTextToken;

    $response = $this->withToken($token)
        ->postJson('/api/v1/logout');

    $response->assertStatus(200);
});

it('rejects unauthenticated requests', function () {
    $response = $this->getJson('/api/v1/posts');

    $response->assertStatus(401);
});

it('limits auth attempts', function () {
    for ($i = 0; $i < 6; $i++) {
        $response = $this->postJson('/api/v1/login', [
            'email' => 'test@example.com',
            'password' => 'wrong',
        ]);
    }

    $response->assertStatus(429);
});

it('sends password reset link', function () {
    Notification::fake();

    $user = User::factory()->create(['email' => 'john@example.com']);

    $response = $this->postJson('/api/v1/forgot-password', [
        'email' => 'john@example.com',
    ]);

    $response->assertStatus(200);

    Notification::assertSentTo($user, ResetPassword::class);
});

it('returns health check', function () {
    $response = $this->getJson('/api/v1/health');

    $response->assertStatus(200)
        ->assertJson(['status' => 'healthy']);
});
