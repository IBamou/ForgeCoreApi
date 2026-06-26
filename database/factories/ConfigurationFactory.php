<?php

namespace Database\Factories;

use App\Models\Blueprint;
use App\Models\Configuration;
use App\Models\Input;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

class ConfigurationFactory extends Factory
{
    protected $model = Configuration::class;

    public function definition(): array
    {
        return [
            'user_id' => User::factory(),
            'blueprint_id' => Blueprint::factory(),
            'input_id' => Input::factory(),
        ];
    }
}
