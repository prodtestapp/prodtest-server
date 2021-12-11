<?php

namespace App\Http\Requests\Step;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class StoreStepRequest extends FormRequest
{
    public function authorize(): bool
    {
        return auth()->check();
    }

    public function rules(): array
    {
        return [
            'name' => ['required', 'string', 'max:255'],
            'url' => ['nullable', 'url', 'max:255'],
            'headers' => ['nullable', 'json'],
            'body_type' => [
                'nullable',
                Rule::in(['json', 'raw', 'html', 'xml']),
            ],
            'body' => ['nullable', 'json'],
            'expected_status' => ['nullable', 'string'],
            'use_validator' => ['nullable', 'boolean'],
            'validator_schema' => ['nullable', 'json'],
        ];
    }
}
