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
            'key' => ['nullable', 'string', 'max:255'],
            'value' => ['nullable', 'string', 'max:255'],
        ];
    }
}
