<?php

namespace App\Http\Controllers;

use App\Http\Requests\BlueprintRequest\StoreBluePrintRequest;
use App\Http\Requests\BlueprintRequest\UpdateBluePrintRequest;
use App\Http\Resources\BluePrintResource;
use App\Http\Traits\FiltersAndSorts;
use App\Models\Blueprint;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class BluePrintController extends Controller
{
    use FiltersAndSorts;

    public function index(Request $request): JsonResponse
    {
        $user = auth()->user();

        $query = $user->bluePrints()->with('createdBy');

        $this->applySearch($query, $request, ['name', 'description', 'tone', 'target_platform']);

        if ($request->has('is_active')) {
            $query->where('is_active', $request->boolean('is_active'));
        }

        if ($request->filled('target_platform')) {
            $query->where('target_platform', $request->str('target_platform'));
        }

        $this->applySort($query, $request, ['created_at', 'updated_at', 'name', 'tone']);

        $blueprints = $query->paginate($this->perPage($request));

        return response()->json(
            $this->paginatedResponse($blueprints, 'blueprints', BluePrintResource::class),
            200
        );
    }

    public function archived(Request $request): JsonResponse
    {
        $user = auth()->user();

        $query = $user->bluePrints()->onlyTrashed()->with('createdBy');

        $this->applySearch($query, $request, ['name', 'description']);

        $this->applySort($query, $request, ['created_at', 'updated_at', 'name']);

        $blueprints = $query->paginate($this->perPage($request));

        return response()->json(
            $this->paginatedResponse($blueprints, 'blueprints', BluePrintResource::class),
            200
        );
    }

    public function store(StoreBluePrintRequest $request): JsonResponse
    {
        $validated = $request->validated();

        $blueprint = Blueprint::create([
            ...$validated,
            'user_id' => auth()->id(),
            'is_active' => true,
        ]);

        return response()->json([
            'message' => 'Blueprint created successfully.',
            'blueprint' => BluePrintResource::make($blueprint),
        ], 201);
    }

    public function show(Blueprint $blueprint): JsonResponse
    {
        $this->authorize('view', $blueprint);

        $blueprint->load('createdBy');

        return response()->json([
            'blueprint' => BluePrintResource::make($blueprint),
        ], 200);
    }

    public function update(UpdateBluePrintRequest $request, Blueprint $blueprint): JsonResponse
    {
        $this->authorize('update', $blueprint);

        $validated = $request->validated();

        $blueprint->update($validated);

        return response()->json([
            'message' => 'Blueprint updated successfully.',
            'blueprint' => BluePrintResource::make($blueprint),
        ], 200);
    }

    public function archive(Blueprint $blueprint): JsonResponse
    {
        $this->authorize('delete', $blueprint);

        $blueprint->delete();

        return response()->json([
            'message' => 'Blueprint archived successfully.',
        ], 200);
    }

    public function restore(Blueprint $blueprint): JsonResponse
    {
        $this->authorize('restore', $blueprint);

        $blueprint->restore();

        return response()->json([
            'message' => 'Blueprint restored successfully.',
            'blueprint' => BluePrintResource::make($blueprint),
        ], 200);
    }

    public function forceDelete(Blueprint $blueprint): JsonResponse
    {
        $this->authorize('forceDelete', $blueprint);

        $blueprint->forceDelete();

        return response()->json([
            'message' => 'Blueprint permanently deleted.',
        ], 200);
    }
}
