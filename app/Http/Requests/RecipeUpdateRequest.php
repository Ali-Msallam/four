<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RecipeUpdateRequest extends FormRequest
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
            'category_id' => ['required', 'exists:categories,id'],
            'user_id' => ['required', 'exists:users,id'],
            'name' => ['required', 'max:255', 'string'],
            'description' => ['required', 'max:255', 'string'],
            'tips' => ['required', 'max:255', 'string'],
            'main_img_url' => ['required', 'max:255', 'string'],
            'views' => ['required', 'max:255'],
            'expected_cost' => ['required', 'numeric'],
            'expected_time' => ['required', 'date_format:H:i:s'],
            'difficulty level' => ['required', 'numeric'],
        ];
    }
}
