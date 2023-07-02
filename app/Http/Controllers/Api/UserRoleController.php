<?php

namespace App\Http\Controllers\Api;

use App\Models\UserRole;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Http\Controllers\Controller;
use App\Http\Resources\UserRoleResource;
use App\Http\Resources\UserRoleCollection;
use App\Http\Requests\UserRoleStoreRequest;
use App\Http\Requests\UserRoleUpdateRequest;

class UserRoleController extends Controller
{
    public function index(Request $request): UserRoleCollection
    {
        $this->authorize('view-any', UserRole::class);

        $search = $request->get('search', '');

        $userRoles = UserRole::search($search)
            ->latest()
            ->paginate();

        return new UserRoleCollection($userRoles);
    }

    public function store(UserRoleStoreRequest $request): UserRoleResource
    {
        $this->authorize('create', UserRole::class);

        $validated = $request->validated();

        $userRole = UserRole::create($validated);

        return new UserRoleResource($userRole);
    }

    public function show(Request $request, UserRole $userRole): UserRoleResource
    {
        $this->authorize('view', $userRole);

        return new UserRoleResource($userRole);
    }

    public function update(
        UserRoleUpdateRequest $request,
        UserRole $userRole
    ): UserRoleResource {
        $this->authorize('update', $userRole);

        $validated = $request->validated();

        $userRole->update($validated);

        return new UserRoleResource($userRole);
    }

    public function destroy(Request $request, UserRole $userRole): Response
    {
        $this->authorize('delete', $userRole);

        $userRole->delete();

        return response()->noContent();
    }
}
