<?php

namespace App\Http\Requests\Environment;

use Illuminate\Foundation\Http\FormRequest;

class StoreEnvironmentRequest extends FormRequest
{
    public function authorize(): bool
    {
        return auth()->check();
    }

    public function rules(): array
    {
        return [
            'name' => ['required', 'string', 'max:255'],
            'data' => ['required', 'json', 'max:255'],
        ];
    }
}
