<?php

use App\Models\Blueprint;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;

uses(RefreshDatabase::class);

test('List Blueprints', function () {
    // Arrange
    $user = User::factory()->create();

    $Blueprints = Blueprint::factory(3)->create([
        'user_id' => $user->id,
    ]);

    $token = $user->createToken('test-token')->plainTextToken;
    // We can use also => Sanctum::actingAs($user, ['*']);

    // Act
    $response = $this->withToken($token)
        ->getJson('/api/v1/blueprints');

    // Assert

    // $response->dump();

    $response->assertJsonStructure([
        'blueprints',
    ])->assertStatus(200);
});
