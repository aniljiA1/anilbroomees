<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateUserRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    protected function prepareForValidation()
    {
        if (!$this->isJson()) {
            abort(400, 'Content-Type must be application/json');
        }
    }

    public function rules(): array
    {
        return [
            'age' => ['required', 'integer', 'min:0'],
            'version' => ['required', 'integer', 'min:1'],
        ];
    }

    protected function failedValidation(\Illuminate\Contracts\Validation\Validator $validator)
    {
        response()->json([
            'errors' => $validator->errors()
        ], 400)->throwResponse();
    }
}
