<?php

namespace App\Http\Controllers\Api;

use App\Models\Rate;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Http\Resources\RateResource;
use App\Http\Controllers\Controller;
use App\Http\Resources\RateCollection;
use App\Http\Requests\RateStoreRequest;
use App\Http\Requests\RateUpdateRequest;

class RateController extends Controller
{
    public function index(Request $request): RateCollection
    {
        $this->authorize('view-any', Rate::class);

        $search = $request->get('search', '');

        $rates = Rate::search($search)
            ->latest()
            ->paginate();

        return new RateCollection($rates);
    }

    public function store(RateStoreRequest $request): RateResource
    {
        $this->authorize('create', Rate::class);

        $validated = $request->validated();

        $rate = Rate::create($validated);

        return new RateResource($rate);
    }

    public function show(Request $request, Rate $rate): RateResource
    {
        $this->authorize('view', $rate);

        return new RateResource($rate);
    }

    public function update(RateUpdateRequest $request, Rate $rate): RateResource
    {
        $this->authorize('update', $rate);

        $validated = $request->validated();

        $rate->update($validated);

        return new RateResource($rate);
    }

    public function destroy(Request $request, Rate $rate): Response
    {
        $this->authorize('delete', $rate);

        $rate->delete();

        return response()->noContent();
    }
}
