<?php

namespace App\Ai\Agents;

use App\Ai\Tools\GetPostDetail;
use App\Prompts\ConversationAgentPrompt;
use Laravel\Ai\Contracts\Agent;
use Laravel\Ai\Contracts\Conversational;
use Laravel\Ai\Contracts\HasTools;
use Laravel\Ai\Promptable;
use Stringable;

class ConversationAgent implements Agent, Conversational, HasTools
{
    use Promptable;

    private array $messages = [];

    private ?array $postData = null;

    public function __construct(array $messages = [], ?array $postData = null)
    {
        $this->messages = $messages;
        $this->postData = $postData;
    }

    public function instructions(): Stringable|string
    {
        return ConversationAgentPrompt::build($this->postData);
    }

    public function messages(): iterable
    {
        return $this->messages;
    }

    public function tools(): iterable
    {
        return [
            new GetPostDetail,
        ];
    }
}
