<?php

namespace Database\Factories;

use App\Enums\PostStatus;
use App\Enums\ProcessStatus;
use App\Models\Configuration;
use App\Models\Post;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

class PostFactory extends Factory
{
    protected $model = Post::class;

    public function definition(): array
    {
        return [
            'user_id' => User::factory(),
            'configuration_id' => Configuration::factory(),
            'title' => fake()->sentence(5),
            'hook_proposal' => fake()->sentence(),
            'body_points' => [fake()->sentence(), fake()->sentence()],
            'suggested_hashtags' => [fake()->word(), fake()->word()],
            'technical_readability_score' => fake()->numberBetween(1, 10),
            'tone_compliance_justification' => fake()->paragraph(),
            'process_status' => ProcessStatus::Pending,
            'status' => PostStatus::InReview,
        ];
    }
}
