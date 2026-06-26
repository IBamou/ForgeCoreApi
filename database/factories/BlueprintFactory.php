<?php

namespace Database\Factories;

use App\Models\Blueprint;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

class BlueprintFactory extends Factory
{
    protected $model = Blueprint::class;

    public function definition(): array
    {
        return [
            'user_id' => User::factory(),
            'name' => fake()->sentence(3),
            'description' => fake()->paragraph(),
            'tone' => fake()->randomElement(['professional', 'casual', 'technical']),
            'target_platform' => fake()->randomElement(['x', 'linkedin', 'blog']),
            'max_length' => fake()->randomElement([280, 500, 1000]),
            'structure_rules' => ['hook', 'body_points', 'conclusion'],
            'style_rules' => ['use short sentences'],
            'hashtag_strategy' => ['tech'],
            'is_active' => true,
        ];
    }
}
