<?php

namespace App\Http\Controllers\Api;

use App\Models\Report;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Http\Controllers\Controller;
use App\Http\Resources\ReportResource;
use App\Http\Resources\ReportCollection;
use App\Http\Requests\ReportStoreRequest;
use App\Http\Requests\ReportUpdateRequest;

class ReportController extends Controller
{
    public function index(Request $request): ReportCollection
    {
        $this->authorize('view-any', Report::class);

        $search = $request->get('search', '');

        $reports = Report::search($search)
            ->latest()
            ->paginate();

        return new ReportCollection($reports);
    }

    public function store(ReportStoreRequest $request): ReportResource
    {
        $this->authorize('create', Report::class);

        $validated = $request->validated();

        $report = Report::create($validated);

        return new ReportResource($report);
    }

    public function show(Request $request, Report $report): ReportResource
    {
        $this->authorize('view', $report);

        return new ReportResource($report);
    }

    public function update(
        ReportUpdateRequest $request,
        Report $report
    ): ReportResource {
        $this->authorize('update', $report);

        $validated = $request->validated();

        $report->update($validated);

        return new ReportResource($report);
    }

    public function destroy(Request $request, Report $report): Response
    {
        $this->authorize('delete', $report);

        $report->delete();

        return response()->noContent();
    }
}
