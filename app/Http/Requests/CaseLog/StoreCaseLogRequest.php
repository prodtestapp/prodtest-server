<?php

namespace App\Http\Requests\CaseLog;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class StoreCaseLogRequest extends FormRequest
{
    public function authorize(): bool
    {
        return auth()->check();
    }

    public function rules(): array
    {
        return [
            'status' => ['required', 'boolean'],
            'failed_step_id' => [
                'required_if:status,false',
                Rule::exists('steps', 'id')->where(function ($query) {
                    $query->where('project_case_id', $this->route('projectCase')->id);
                }),
            ],
        ];
    }
}
