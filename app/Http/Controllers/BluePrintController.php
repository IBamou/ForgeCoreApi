<?php

namespace App\Http\Controllers;

use App\Http\Requests\BlueprintRequest\StoreBluePrintRequest;
use App\Http\Requests\BlueprintRequest\UpdateBluePrintRequest;
use App\Http\Resources\BluePrintResource;
use App\Http\Traits\FiltersAndSorts;
use App\Models\Blueprint;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

/**
 * @group Blueprints
 *
 * Define reusable content templates that control tone, target platform, length, and style of generated posts.
 * Blueprints act as the instruction set for the AI, ensuring consistent brand voice across all content.
 */
class BluePrintController extends Controller
{
    use FiltersAndSorts;

    /**
     * List blueprints
     *
     * Returns a paginated list of blueprints for the authenticated user.
     *
     * @authenticated
     *
     * @queryParam page int Page number. Example: 1
     * @queryParam per_page int Items per page (1-100). Example: 15
     * @queryParam search string Search by name, description, tone or target platform. Example: tech
     * @queryParam is_active bool Filter by active status. Example: true
     * @queryParam target_platform string Filter by platform (x, linkedin). Example: linkedin
     * @queryParam sort string Sort by field (created_at, updated_at, name, tone). Example: created_at
     * @queryParam direction string Sort direction (asc, desc). Example: desc
     *
     * @response 200 scenario="success" {
     *   "blueprints": [{"id": 1, "name": "Tech Blog", ...}],
     *   "meta": {"current_page": 1, "last_page": 1, "per_page": 15, "total": 1}
     * }
     */
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

    /**
     * List archived blueprints
     *
     * Returns a paginated list of soft-deleted blueprints.
     *
     * @authenticated
     *
     * @queryParam page int Page number. Example: 1
     * @queryParam per_page int Items per page (1-100). Example: 15
     * @queryParam search string Search by name or description. Example: tech
     * @queryParam sort string Sort by field (created_at, updated_at, name). Example: created_at
     * @queryParam direction string Sort direction (asc, desc). Example: desc
     *
     * @response 200 scenario="success" {
     *   "blueprints": [{"id": 1, "name": "Tech Blog", ...}],
     *   "meta": {"current_page": 1, "last_page": 1, "per_page": 15, "total": 1}
     * }
     */
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

    /**
     * Create a blueprint
     *
     * Creates a new content blueprint.
     *
     * @authenticated
     *
     * @response 201 scenario="success" {
     *   "message": "Blueprint created successfully.",
     *   "blueprint": {"id": 1, "name": "Tech Blog", "tone": "technical", ...}
     * }
     */
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

    /**
     * Show a blueprint
     *
     * Returns the details of a specific blueprint.
     *
     * @authenticated
     *
     * @urlParam blueprint int required The blueprint ID. Example: 1
     *
     * @response 200 scenario="success" {
     *   "blueprint": {"id": 1, "name": "Tech Blog", "tone": "technical", ...}
     * }
     */
    public function show(Blueprint $blueprint): JsonResponse
    {
        $this->authorize('view', $blueprint);

        $blueprint->load('createdBy');

        return response()->json([
            'blueprint' => BluePrintResource::make($blueprint),
        ], 200);
    }

    /**
     * Update a blueprint
     *
     * Updates the fields of a specific blueprint.
     *
     * @authenticated
     *
     * @urlParam blueprint int required The blueprint ID. Example: 1
     *
     * @response 200 {"message": "Blueprint updated successfully.", "blueprint": {"id": 1, ...}}
     */
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

    /**
     * Archive a blueprint
     *
     * Soft-deletes a specific blueprint.
     *
     * @authenticated
     *
     * @urlParam blueprint int required The blueprint ID. Example: 1
     *
     * @response 200 {"message": "Blueprint archived successfully."}
     */
    public function archive(Blueprint $blueprint): JsonResponse
    {
        $this->authorize('delete', $blueprint);

        $blueprint->delete();

        return response()->json([
            'message' => 'Blueprint archived successfully.',
        ], 200);
    }

    /**
     * Restore a blueprint
     *
     * Restores a soft-deleted blueprint.
     *
     * @authenticated
     *
     * @urlParam blueprint int required The blueprint ID. Example: 1
     *
     * @response 200 {"message": "Blueprint restored successfully.", "blueprint": {"id": 1, ...}}
     */
    public function restore(Blueprint $blueprint): JsonResponse
    {
        $this->authorize('restore', $blueprint);

        $blueprint->restore();

        return response()->json([
            'message' => 'Blueprint restored successfully.',
            'blueprint' => BluePrintResource::make($blueprint),
        ], 200);
    }

    /**
     * Permanently delete a blueprint
     *
     * Force-deletes a blueprint from the database.
     *
     * @authenticated
     *
     * @urlParam blueprint int required The blueprint ID. Example: 1
     *
     * @response 200 {"message": "Blueprint permanently deleted."}
     */
    public function forceDelete(Blueprint $blueprint): JsonResponse
    {
        $this->authorize('forceDelete', $blueprint);

        $blueprint->forceDelete();

        return response()->json([
            'message' => 'Blueprint permanently deleted.',
        ], 200);
    }
}
