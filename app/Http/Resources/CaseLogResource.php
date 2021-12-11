<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class CaseLogResource extends JsonResource
{
    /**
     * @param Request $request
     * @return array
     */
    public function toArray($request): array
    {
        return [
            'id' => $this->id,
            'project_id' => $this->project_id,
            'project_case_id' => $this->project_case_id,
            'failed_step_id' => $this->failed_step_id,
            'status' => $this->status,
            'project' => $this->whenLoaded('project'),
            'case' => $this->whenLoaded('case'),
            'failed_step' => $this->whenLoaded('failedStep'),
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
        ];
    }
}
