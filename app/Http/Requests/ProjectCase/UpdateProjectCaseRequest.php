<?php

namespace App\Http\Requests\ProjectCase;

use Illuminate\Foundation\Http\FormRequest;

class UpdateProjectCaseRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return auth()->check();
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules(): array
    {
        return [
            'name' => ['nullable', 'string', 'max:255'],
            'order_no' => ['nullable', 'integer'],
        ];
    }
}
