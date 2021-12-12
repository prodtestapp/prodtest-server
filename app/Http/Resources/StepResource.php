<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class StepResource extends JsonResource
{
    /**
     * @param Request $request
     * @return array
     */
    public function toArray($request): array
    {
        return [
            'id' => $this->id,
            'project_case_id' => $this->project_case_id,
            'key' => $this->key,
            'name' => $this->name,
            'url' => $this->url,
            'method' => $this->method,
            'headers' => $this->headers,
            'body_type' => $this->body_type,
            'body' => $this->body,
            'expected_status' => $this->expected_status,
            'use_validator' => $this->use_validator,
            'validator_schema' => $this->validator_schema,
            'order_no' => $this->order_no,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
        ];
    }
}
