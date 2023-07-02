<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class LikeStoreRequest extends FormRequest
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
     */
    public function rules(): array
    {
        return [
            'user_id' => ['required', 'max:255'],
            'recipe_id' => ['required', 'exists:recipes,id'],
        ];
    }
}
