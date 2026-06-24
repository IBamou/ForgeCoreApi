<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class PostResource extends JsonResource
{
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'user_id' => $this->user_id,
            'configuration_id' => $this->configuration_id,
            'title' => $this->title,
            'hook_proposal' => $this->hook_proposal,
            'body_points' => $this->body_points,
            'suggested_hashtags' => $this->suggested_hashtags,
            'technical_readability_score' => $this->technical_readability_score,
            'tone_compliance_justification' => $this->tone_compliance_justification,
            'process_status' => $this->process_status,
            'status' => $this->status,
            'ai_payload' => $this->ai_payload,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
            'deleted_at' => $this->deleted_at,
            'created_by' => UserResource::make($this->whenLoaded('createdBy')),
            'configuration' => ConfigurationResource::make($this->whenLoaded('configuration')),
        ];
    }
}
