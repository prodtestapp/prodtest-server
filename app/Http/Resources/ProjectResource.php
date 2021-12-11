<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class ProjectResource extends JsonResource
{
    /**
     * @param Request $request
     * @return array
     */
    public function toArray($request): array
    {
        return [
            'id' => $this->id,
            'name' => $this->name,
            'background_color' => $this->background_color,
            'cases' => ProjectCaseResource::collection($this->whenLoaded('cases')),
            'environments' => EnvironmentResource::collection($this->whenLoaded('environments')),
            'cases_count' => $this->when(isset($this->cases_count), $this->cases_count),
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
        ];
    }
}
