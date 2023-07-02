<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Models\RecipeIngredients;
use App\Http\Controllers\Controller;
use App\Http\Resources\RecipeIngredientsResource;
use App\Http\Resources\RecipeIngredientsCollection;
use App\Http\Requests\RecipeIngredientsStoreRequest;
use App\Http\Requests\RecipeIngredientsUpdateRequest;

class RecipeIngredientsController extends Controller
{
    public function index(Request $request): RecipeIngredientsCollection
    {
        $this->authorize('view-any', RecipeIngredients::class);

        $search = $request->get('search', '');

        $allRecipeIngredients = RecipeIngredients::search($search)
            ->latest()
            ->paginate();

        return new RecipeIngredientsCollection($allRecipeIngredients);
    }

    public function store(
        RecipeIngredientsStoreRequest $request
    ): RecipeIngredientsResource {
        $this->authorize('create', RecipeIngredients::class);

        $validated = $request->validated();

        $recipeIngredients = RecipeIngredients::create($validated);

        return new RecipeIngredientsResource($recipeIngredients);
    }

    public function show(
        Request $request,
        RecipeIngredients $recipeIngredients
    ): RecipeIngredientsResource {
        $this->authorize('view', $recipeIngredients);

        return new RecipeIngredientsResource($recipeIngredients);
    }

    public function update(
        RecipeIngredientsUpdateRequest $request,
        RecipeIngredients $recipeIngredients
    ): RecipeIngredientsResource {
        $this->authorize('update', $recipeIngredients);

        $validated = $request->validated();

        $recipeIngredients->update($validated);

        return new RecipeIngredientsResource($recipeIngredients);
    }

    public function destroy(
        Request $request,
        RecipeIngredients $recipeIngredients
    ): Response {
        $this->authorize('delete', $recipeIngredients);

        $recipeIngredients->delete();

        return response()->noContent();
    }
}
