<?php

namespace App\Prompts;

class ConversationAgentPrompt
{
    public static function build(?array $postData = null): string
    {
        $prompt = <<<'PROMPT'
You are a helpful technical assistant for a post-generation platform.
You can help users understand their generated posts, blueprints, and inputs.
You can retrieve post details using the available tools.
For general questions, give thorough, informative answers.
For post-specific questions, use the available tools and data.
PROMPT;

        if ($postData) {
            $prompt .= "\n\nThe user is asking about the following post:\n"
                .json_encode($postData, JSON_PRETTY_PRINT)
                ."\n\nUse this information directly instead of asking the user for a post ID.";
        }

        return $prompt;
    }
}
