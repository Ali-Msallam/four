<?php

namespace App\Http\Controllers\Api;

use App\Models\Step;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Http\Resources\StepResource;
use App\Http\Controllers\Controller;
use App\Http\Resources\StepCollection;
use App\Http\Requests\StepStoreRequest;
use Illuminate\Support\Facades\Storage;
use App\Http\Requests\StepUpdateRequest;

class StepController extends Controller
{
    public function index(Request $request): StepCollection
    {
        $this->authorize('view-any', Step::class);

        $search = $request->get('search', '');

        $steps = Step::search($search)
            ->latest()
            ->paginate();

        return new StepCollection($steps);
    }

    public function store(StepStoreRequest $request): StepResource
    {
        $this->authorize('create', Step::class);

        $validated = $request->validated();
        if ($request->hasFile('image_url')) {
            $validated['image_url'] = $request
                ->file('image_url')
                ->store('public');
        }

        $step = Step::create($validated);

        return new StepResource($step);
    }

    public function show(Request $request, Step $step): StepResource
    {
        $this->authorize('view', $step);

        return new StepResource($step);
    }

    public function update(StepUpdateRequest $request, Step $step): StepResource
    {
        $this->authorize('update', $step);

        $validated = $request->validated();

        if ($request->hasFile('image_url')) {
            if ($step->image_url) {
                Storage::delete($step->image_url);
            }

            $validated['image_url'] = $request
                ->file('image_url')
                ->store('public');
        }

        $step->update($validated);

        return new StepResource($step);
    }

    public function destroy(Request $request, Step $step): Response
    {
        $this->authorize('delete', $step);

        if ($step->image_url) {
            Storage::delete($step->image_url);
        }

        $step->delete();

        return response()->noContent();
    }
}
