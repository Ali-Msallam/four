<?php

namespace App\Http\Controllers\Api;

use App\Models\FavRecipe;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Http\Controllers\Controller;
use App\Http\Resources\FavRecipeResource;
use App\Http\Resources\FavRecipeCollection;
use App\Http\Requests\FavRecipeStoreRequest;
use App\Http\Requests\FavRecipeUpdateRequest;

class FavRecipeController extends Controller
{
    public function index(Request $request): FavRecipeCollection
    {
        $this->authorize('view-any', FavRecipe::class);

        $search = $request->get('search', '');

        $favRecipes = FavRecipe::search($search)
            ->latest()
            ->paginate();

        return new FavRecipeCollection($favRecipes);
    }

    public function store(FavRecipeStoreRequest $request): FavRecipeResource
    {
        $this->authorize('create', FavRecipe::class);

        $validated = $request->validated();

        $favRecipe = FavRecipe::create($validated);

        return new FavRecipeResource($favRecipe);
    }

    public function show(
        Request $request,
        FavRecipe $favRecipe
    ): FavRecipeResource {
        $this->authorize('view', $favRecipe);

        return new FavRecipeResource($favRecipe);
    }

    public function update(
        FavRecipeUpdateRequest $request,
        FavRecipe $favRecipe
    ): FavRecipeResource {
        $this->authorize('update', $favRecipe);

        $validated = $request->validated();

        $favRecipe->update($validated);

        return new FavRecipeResource($favRecipe);
    }

    public function destroy(Request $request, FavRecipe $favRecipe): Response
    {
        $this->authorize('delete', $favRecipe);

        $favRecipe->delete();

        return response()->noContent();
    }
}
