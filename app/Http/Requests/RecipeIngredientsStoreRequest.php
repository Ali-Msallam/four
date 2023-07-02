<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RecipeIngredientsStoreRequest extends FormRequest
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
            'recipe_id' => ['required', 'exists:recipes,id'],
            'ingredients_id' => ['required', 'exists:ingredients,id'],
            'quanttity' => ['required', 'numeric'],
            'reduserCompany' => ['required', 'max:255', 'string'],
            'is_main_ingredient' => ['required', 'max:255', 'string'],
        ];
    }
}
