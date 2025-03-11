<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CategoriaRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'nombre' => 'required|string|min:2',
            'code' => 'nullable|string|min:2',
            'status' => 'nullable|in:ACTIVE,INACTIVE',
            'is_public' => 'nullable',
            'is_promediable' => 'nullable',
            'is_schedulable' => 'nullable',
        ];
    }
}
