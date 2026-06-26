<?php

namespace App\Services;

use Illuminate\Support\Facades\Log;
use Laravel\Ai\Contracts\Agent;

class AiClient
{
    private readonly string $provider;

    private readonly string $model;

    private readonly int $timeout;

    public function __construct()
    {
        $this->provider = config('ai.providers.groq.driver');
        $this->model = config('ai.providers.groq.model');
        $this->timeout = (int) config('ai.providers.groq.timeout');
    }

    public function prompt(Agent $agent, string $prompt): string
    {
        Log::debug('AiClient prompting', [
            'provider' => $this->provider,
            'model' => $this->model,
            'timeout' => $this->timeout,
        ]);

        try {
            $response = $agent->prompt(
                prompt: $prompt,
                provider: $this->provider,
                model: $this->model,
                timeout: $this->timeout,
            );

            return (string) $response;
        } catch (\Throwable $e) {
            $message = $e->getMessage();
            $isRateLimit = str_contains($message, '429')
                || str_contains($message, 'rate limit')
                || str_contains($message, 'too many requests')
                || str_contains(strtolower($message), 'rate_limit');

            Log::error('AiClient provider error', [
                'provider' => $this->provider,
                'model' => $this->model,
                'is_rate_limit' => $isRateLimit,
                'error' => $message,
            ]);

            if ($isRateLimit) {
                throw new \RuntimeException(
                    'AI service is currently rate limited. Please try again later.',
                    429,
                    $e,
                );
            }

            throw new \RuntimeException(
                'AI service request failed: '.$message,
                (int) $e->getCode() ?: 500,
                $e,
            );
        }
    }

    public static function parseResponse(string $response): ?array
    {
        $data = json_decode($response, true);

        if (json_last_error() !== JSON_ERROR_NONE) {
            if (preg_match('/```json\s*(.*?)\s*```/s', $response, $m)) {
                $data = json_decode($m[1], true);
            } elseif (preg_match('/```\s*(.*?)\s*```/s', $response, $m)) {
                $data = json_decode($m[1], true);
            }
        }

        if (! is_array($data)) {
            Log::error('AiClient failed to parse response', [
                'raw_response' => mb_substr($response, 0, 2000),
            ]);
        }

        return is_array($data) ? $data : null;
    }
}
