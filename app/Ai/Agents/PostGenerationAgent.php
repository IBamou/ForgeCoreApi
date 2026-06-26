<?php

namespace App\Ai\Agents;

use App\Prompts\PostGenerationPrompt;
use Laravel\Ai\Contracts\Agent;
use Laravel\Ai\Promptable;
use Stringable;

class PostGenerationAgent implements Agent
{
    use Promptable;

    public function instructions(): Stringable|string
    {
        return PostGenerationPrompt::build();
    }
}
