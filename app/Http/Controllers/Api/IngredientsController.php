<?php

namespace App\Http\Controllers\Api;

use App\Models\Ingredients;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Http\Controllers\Controller;
use App\Http\Resources\IngredientsResource;
use App\Http\Resources\IngredientsCollection;
use App\Http\Requests\IngredientsStoreRequest;
use App\Http\Requests\IngredientsUpdateRequest;

class IngredientsController extends Controller
{
    public function index(Request $request): IngredientsCollection
    {
        $this->authorize('view-any', Ingredients::class);

        $search = $request->get('search', '');

        $allIngredients = Ingredients::search($search)
            ->latest()
            ->paginate();

        return new IngredientsCollection($allIngredients);
    }

    public function store(IngredientsStoreRequest $request): IngredientsResource
    {
        $this->authorize('create', Ingredients::class);

        $validated = $request->validated();

        $ingredients = Ingredients::create($validated);

        return new IngredientsResource($ingredients);
    }

    public function show(
        Request $request,
        Ingredients $ingredients
    ): IngredientsResource {
        $this->authorize('view', $ingredients);

        return new IngredientsResource($ingredients);
    }

    public function update(
        IngredientsUpdateRequest $request,
        Ingredients $ingredients
    ): IngredientsResource {
        $this->authorize('update', $ingredients);

        $validated = $request->validated();

        $ingredients->update($validated);

        return new IngredientsResource($ingredients);
    }

    public function destroy(
        Request $request,
        Ingredients $ingredients
    ): Response {
        $this->authorize('delete', $ingredients);

        $ingredients->delete();

        return response()->noContent();
    }
}
