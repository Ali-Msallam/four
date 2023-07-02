<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Models\Advertisement;
use App\Http\Controllers\Controller;
use App\Http\Resources\AdvertisementResource;
use App\Http\Resources\AdvertisementCollection;
use App\Http\Requests\AdvertisementStoreRequest;
use App\Http\Requests\AdvertisementUpdateRequest;

class AdvertisementController extends Controller
{
    public function index(Request $request): AdvertisementCollection
    {
        $this->authorize('view-any', Advertisement::class);

        $search = $request->get('search', '');

        $advertisements = Advertisement::search($search)
            ->latest()
            ->paginate();

        return new AdvertisementCollection($advertisements);
    }

    public function store(
        AdvertisementStoreRequest $request
    ): AdvertisementResource {
        $this->authorize('create', Advertisement::class);

        $validated = $request->validated();

        $advertisement = Advertisement::create($validated);

        return new AdvertisementResource($advertisement);
    }

    public function show(
        Request $request,
        Advertisement $advertisement
    ): AdvertisementResource {
        $this->authorize('view', $advertisement);

        return new AdvertisementResource($advertisement);
    }

    public function update(
        AdvertisementUpdateRequest $request,
        Advertisement $advertisement
    ): AdvertisementResource {
        $this->authorize('update', $advertisement);

        $validated = $request->validated();

        $advertisement->update($validated);

        return new AdvertisementResource($advertisement);
    }

    public function destroy(
        Request $request,
        Advertisement $advertisement
    ): Response {
        $this->authorize('delete', $advertisement);

        $advertisement->delete();

        return response()->noContent();
    }
}
