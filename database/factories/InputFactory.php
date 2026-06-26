<?php

namespace Database\Factories;

use App\Models\Input;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

class InputFactory extends Factory
{
    protected $model = Input::class;

    public function definition(): array
    {
        return [
            'user_id' => User::factory(),
            'title' => fake()->sentence(3),
            'raw_input' => fake()->paragraphs(3, true),
        ];
    }
}
