<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class ConfigurationResource extends JsonResource
{
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'user_id' => $this->user_id,
            'blueprint_id' => $this->blueprint_id,
            'input_id' => $this->input_id,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
            'user' => UserResource::make($this->whenLoaded('user')),
            'blueprint' => BluePrintResource::make($this->whenLoaded('blueprint')),
            'input' => InputResource::make($this->whenLoaded('input')),
        ];
    }
}
