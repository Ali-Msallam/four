<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Models\RolePermission;
use App\Http\Controllers\Controller;
use App\Http\Resources\RolePermissionResource;
use App\Http\Resources\RolePermissionCollection;
use App\Http\Requests\RolePermissionStoreRequest;
use App\Http\Requests\RolePermissionUpdateRequest;

class RolePermissionController extends Controller
{
    public function index(Request $request): RolePermissionCollection
    {
        $this->authorize('view-any', RolePermission::class);

        $search = $request->get('search', '');

        $rolePermissions = RolePermission::search($search)
            ->latest()
            ->paginate();

        return new RolePermissionCollection($rolePermissions);
    }

    public function store(
        RolePermissionStoreRequest $request
    ): RolePermissionResource {
        $this->authorize('create', RolePermission::class);

        $validated = $request->validated();

        $rolePermission = RolePermission::create($validated);

        return new RolePermissionResource($rolePermission);
    }

    public function show(
        Request $request,
        RolePermission $rolePermission
    ): RolePermissionResource {
        $this->authorize('view', $rolePermission);

        return new RolePermissionResource($rolePermission);
    }

    public function update(
        RolePermissionUpdateRequest $request,
        RolePermission $rolePermission
    ): RolePermissionResource {
        $this->authorize('update', $rolePermission);

        $validated = $request->validated();

        $rolePermission->update($validated);

        return new RolePermissionResource($rolePermission);
    }

    public function destroy(
        Request $request,
        RolePermission $rolePermission
    ): Response {
        $this->authorize('delete', $rolePermission);

        $rolePermission->delete();

        return response()->noContent();
    }
}
