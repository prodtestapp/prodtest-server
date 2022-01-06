<?php

namespace App\Http\Requests\Step;

use App\Enums\BodyType;
use App\Enums\HttpMethod;
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
            'url' => ['required', 'max:255'],
            'method' => [
                'required',
                'string',
                'max:255',
                Rule::in(array_column(HttpMethod::cases(), 'value')),
            ],
            'headers' => ['nullable', 'string'],
            'body_type' => [
                'nullable',
                Rule::in(array_column(BodyType::cases(), 'value')),
            ],
            'body' => ['nullable', 'string'],
            'expected_status' => ['nullable', 'string'],
            'use_validator' => ['nullable', 'boolean'],
            'validator_schema' => ['nullable', 'string'],
        ];
    }
}
