<?php

namespace App\Http\Controllers\Api;

use App\Models\Like;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Http\Resources\LikeResource;
use App\Http\Controllers\Controller;
use App\Http\Resources\LikeCollection;
use App\Http\Requests\LikeStoreRequest;
use App\Http\Requests\LikeUpdateRequest;

class LikeController extends Controller
{
    public function index(Request $request): LikeCollection
    {
        $this->authorize('view-any', Like::class);

        $search = $request->get('search', '');

        $likes = Like::search($search)
            ->latest()
            ->paginate();

        return new LikeCollection($likes);
    }

    public function store(LikeStoreRequest $request): LikeResource
    {
        $this->authorize('create', Like::class);

        $validated = $request->validated();

        $like = Like::create($validated);

        return new LikeResource($like);
    }

    public function show(Request $request, Like $like): LikeResource
    {
        $this->authorize('view', $like);

        return new LikeResource($like);
    }

    public function update(LikeUpdateRequest $request, Like $like): LikeResource
    {
        $this->authorize('update', $like);

        $validated = $request->validated();

        $like->update($validated);

        return new LikeResource($like);
    }

    public function destroy(Request $request, Like $like): Response
    {
        $this->authorize('delete', $like);

        $like->delete();

        return response()->noContent();
    }
}
