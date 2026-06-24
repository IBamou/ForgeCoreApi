<?php

namespace App\DTOs;

use App\Models\Configuration;

class PostGenerationData
{
    public static function configurationData(Configuration $configuration): array
    {
        return [
            'blueprint' => [
                'name' => $configuration->blueprint->name,
                'description' => $configuration->blueprint->description,
                'tone' => $configuration->blueprint->tone,
                'target_platform' => $configuration->blueprint->target_platform,
                'max_length' => $configuration->blueprint->max_length,
                'structure_rules' => $configuration->blueprint->structure_rules,
                'style_rules' => $configuration->blueprint->style_rules,
                'hashtag_strategy' => $configuration->blueprint->hashtag_strategy,
            ],

            'input' => [
                'title' => $configuration->input->title,
                'raw_input' => $configuration->input->raw_input,
            ],
        ];
    }
}
