<?php

namespace App\Schemas;

use Illuminate\Contracts\JsonSchema\JsonSchema;

class PostGenerationSchema
{
    public const int CURRENT_VERSION = 1;

    public static function definition(JsonSchema $schema): array
    {
        return [
            'schema_version' => $schema->integer()->min(1)->max(self::CURRENT_VERSION)->required(),
            'hook_proposal' => $schema->string()->required(),
            'body_points' => $schema->array()->items($schema->string())->required(),
            'suggested_hashtags' => $schema->array()->items($schema->string())->required(),
            'technical_readability_score' => $schema->integer()->min(0)->max(100)->required(),
            'tone_compliance_justification' => $schema->string()->required(),
        ];
    }

    public static function validate(array $data): void
    {
        $required = [
            'schema_version',
            'hook_proposal',
            'body_points',
            'suggested_hashtags',
            'technical_readability_score',
            'tone_compliance_justification',
        ];

        foreach ($required as $field) {
            if (! array_key_exists($field, $data)) {
                throw new \RuntimeException("Missing required field: {$field}");
            }
        }

        if (! is_int($data['schema_version']) || $data['schema_version'] !== self::CURRENT_VERSION) {
            throw new \RuntimeException('schema_version must be '.self::CURRENT_VERSION);
        }

        if (! is_array($data['body_points'])) {
            throw new \RuntimeException('body_points must be an array');
        }

        if (! is_int($data['technical_readability_score']) || $data['technical_readability_score'] < 0 || $data['technical_readability_score'] > 100) {
            throw new \RuntimeException('technical_readability_score must be an integer between 0 and 100');
        }

        if (! is_string($data['hook_proposal'])) {
            throw new \RuntimeException('hook_proposal must be a string');
        }

        if (! is_array($data['suggested_hashtags'])) {
            throw new \RuntimeException('suggested_hashtags must be an array');
        }

        if (! is_string($data['tone_compliance_justification'])) {
            throw new \RuntimeException('tone_compliance_justification must be a string');
        }
    }
}
