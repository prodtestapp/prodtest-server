<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class ProjectCaseResource extends JsonResource
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
            'order_no' => $this->order_no,
            'steps_count' => $this->steps_count ?? 0,
            'project' => ProjectResource::make($this->whenLoaded('project')),
            'latest_log' => CaseLogResource::make($this->whenLoaded('latestLog')),
            'project_id' => $this->project_id,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
        ];
    }
}
