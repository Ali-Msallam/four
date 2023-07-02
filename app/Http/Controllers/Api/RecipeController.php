<?php

namespace App\Http\Controllers\Api;

use App\Models\Recipe;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Http\Controllers\Controller;
use App\Http\Resources\RecipeResource;
use App\Http\Resources\RecipeCollection;
use App\Http\Requests\RecipeStoreRequest;
use App\Http\Requests\RecipeUpdateRequest;

class RecipeController extends Controller
{
    public function index(Request $request): RecipeCollection
    {
        $this->authorize('view-any', Recipe::class);

        $search = $request->get('search', '');

        $recipes = Recipe::search($search)
            ->latest()
            ->paginate();

        return new RecipeCollection($recipes);
    }

    public function store(RecipeStoreRequest $request): RecipeResource
    {
        $this->authorize('create', Recipe::class);

        $validated = $request->validated();

        $recipe = Recipe::create($validated);

        return new RecipeResource($recipe);
    }

    public function show(Request $request, Recipe $recipe): RecipeResource
    {
        $this->authorize('view', $recipe);

        return new RecipeResource($recipe);
    }

    public function update(
        RecipeUpdateRequest $request,
        Recipe $recipe
    ): RecipeResource {
        $this->authorize('update', $recipe);

        $validated = $request->validated();

        $recipe->update($validated);

        return new RecipeResource($recipe);
    }

    public function destroy(Request $request, Recipe $recipe): Response
    {
        $this->authorize('delete', $recipe);

        $recipe->delete();

        return response()->noContent();
    }
}
