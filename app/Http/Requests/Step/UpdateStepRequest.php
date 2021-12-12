<?php

namespace App\Http\Requests\Step;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UpdateStepRequest extends FormRequest
{
    public function authorize(): bool
    {
        return auth()->check();
    }

    public function rules(): array
    {
        return [
            'name' => ['nullable', 'string', 'max:255'],
            'url' => ['nullable', 'max:255'],
            'method' => [
                'nullable',
                'string',
                'max:255',
                Rule::in(['GET', 'POST', 'PUT', 'PATCH', 'DELETE'])
            ],
            'headers' => ['nullable', 'string'],
            'body_type' => [
                'nullable',
                Rule::in(['json', 'raw', 'html', 'xml']),
            ],
            'body' => ['nullable', 'string'],
            'expected_status' => ['nullable', 'string'],
            'use_validator' => ['nullable', 'boolean'],
            'validator_schema' => ['nullable', 'string'],
        ];
    }
}
