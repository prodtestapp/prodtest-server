<?php

namespace App\Http\Requests\Environment;

use Illuminate\Foundation\Http\FormRequest;

class UpdateEnvironmentRequest extends FormRequest
{
    public function authorize(): bool
    {
        return auth()->check();
    }

    public function rules(): array
    {
        return [
            'name' => ['nullable', 'string', 'max:255'],
            'data' => ['nullable', 'json', 'max:255'],
        ];
    }
}
