<?php

namespace App\Http\Controllers;

use App\Http\Requests\InputRequest\StoreInputRequest;
use App\Http\Requests\InputRequest\UpdateInputRequest;
use App\Http\Resources\InputResource;
use App\Http\Traits\FiltersAndSorts;
use App\Models\Input;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

/**
 * @group Inputs
 *
 * APIs for managing raw content inputs used for post generation.
 */
class InputController extends Controller
{
    use FiltersAndSorts;

    /**
     * List inputs
     *
     * Returns a paginated list of inputs for the authenticated user.
     *
     * @authenticated
     *
     * @queryParam page int Page number. Example: 1
     * @queryParam per_page int Items per page (1-100). Example: 15
     * @queryParam search string Search by title or raw input content. Example: article
     * @queryParam sort string Sort by field (created_at, updated_at, title). Example: created_at
     * @queryParam direction string Sort direction (asc, desc). Example: desc
     *
     * @response 200 scenario="success" {
     *   "inputs": [{"id": 1, "title": "My Input", "raw_input": "Content...", ...}],
     *   "meta": {"current_page": 1, "last_page": 1, "per_page": 15, "total": 1}
     * }
     */
    public function index(Request $request): JsonResponse
    {
        $user = auth()->user();

        $query = $user->inputs()->with('createdBy');

        if ($request->filled('search')) {
            $search = $request->str('search');
            $query->where(function ($q) use ($search) {
                $q->where('title', 'like', "%{$search}%")
                    ->orWhere('raw_input', 'like', "%{$search}%");
            });
        }

        $sortField = in_array($request->str('sort')->toString(), ['created_at', 'updated_at', 'title'])
            ? $request->str('sort')->toString()
            : 'created_at';

        $sortDirection = $request->str('direction')->toString() === 'asc' ? 'asc' : 'desc';

        $query->orderBy($sortField, $sortDirection);

        $perPage = max(1, min(100, (int) $request->integer('per_page', 15)));

        $inputs = $query->paginate($perPage);

        return response()->json([
            'inputs' => InputResource::collection($inputs),
            'meta' => [
                'current_page' => $inputs->currentPage(),
                'last_page' => $inputs->lastPage(),
                'per_page' => $inputs->perPage(),
                'total' => $inputs->total(),
            ],
        ], 200);
    }

    /**
     * List archived inputs
     *
     * Returns a paginated list of soft-deleted inputs.
     *
     * @authenticated
     *
     * @queryParam page int Page number. Example: 1
     * @queryParam per_page int Items per page (1-100). Example: 15
     * @queryParam search string Search by title or raw input. Example: article
     * @queryParam sort string Sort by field (created_at, updated_at, title). Example: created_at
     * @queryParam direction string Sort direction (asc, desc). Example: desc
     *
     * @response 200 scenario="success" {
     *   "inputs": [{"id": 1, "title": "My Input", ...}],
     *   "meta": {"current_page": 1, "last_page": 1, "per_page": 15, "total": 1}
     * }
     */
    public function archived(Request $request): JsonResponse
    {
        $user = auth()->user();

        $query = $user->inputs()->onlyTrashed()->with('createdBy');

        $this->applySearch($query, $request, ['title', 'raw_input']);

        $this->applySort($query, $request, ['created_at', 'updated_at', 'title']);

        $inputs = $query->paginate($this->perPage($request));

        return response()->json(
            $this->paginatedResponse($inputs, 'inputs', InputResource::class),
            200
        );
    }

    /**
     * Create an input
     *
     * Creates a new raw content input.
     *
     * @authenticated
     *
     * @response 201 scenario="success" {
     *   "message": "Input created successfully.",
     *   "input": {"id": 1, "title": "My Input", "raw_input": "Content...", ...}
     * }
     */
    public function store(StoreInputRequest $request): JsonResponse
    {
        $validated = $request->validated();

        $input = Input::create([
            ...$validated,
            'user_id' => auth()->id(),
        ]);

        return response()->json([
            'message' => 'Input created successfully.',
            'input' => InputResource::make($input),
        ], 201);
    }

    /**
     * Show an input
     *
     * Returns the details of a specific input.
     *
     * @authenticated
     *
     * @urlParam input int required The input ID. Example: 1
     *
     * @response 200 scenario="success" {
     *   "input": {"id": 1, "title": "My Input", "raw_input": "Content...", ...}
     * }
     */
    public function show(Input $input): JsonResponse
    {
        $this->authorize('view', $input);

        $input->load('createdBy');

        return response()->json([
            'input' => InputResource::make($input),
        ], 200);
    }

    /**
     * Update an input
     *
     * Updates the fields of a specific input.
     *
     * @authenticated
     *
     * @urlParam input int required The input ID. Example: 1
     *
     * @response 200 {"message": "Input updated successfully.", "input": {"id": 1, ...}}
     */
    public function update(UpdateInputRequest $request, Input $input): JsonResponse
    {
        $this->authorize('update', $input);

        $validated = $request->validated();

        $input->update($validated);

        return response()->json([
            'message' => 'Input updated successfully.',
            'input' => InputResource::make($input),
        ], 200);
    }

    /**
     * Archive an input
     *
     * Soft-deletes a specific input.
     *
     * @authenticated
     *
     * @urlParam input int required The input ID. Example: 1
     *
     * @response 200 {"message": "Input archived successfully."}
     */
    public function archive(Input $input): JsonResponse
    {
        $this->authorize('delete', $input);

        $input->delete();

        return response()->json([
            'message' => 'Input archived successfully.',
        ], 200);
    }

    /**
     * Restore an input
     *
     * Restores a soft-deleted input.
     *
     * @authenticated
     *
     * @urlParam input int required The input ID. Example: 1
     *
     * @response 200 {"message": "Input restored successfully.", "input": {"id": 1, ...}}
     */
    public function restore(Input $input): JsonResponse
    {
        $this->authorize('restore', $input);

        $input->restore();

        return response()->json([
            'message' => 'Input restored successfully.',
            'input' => InputResource::make($input),
        ], 200);
    }

    /**
     * Permanently delete an input
     *
     * Force-deletes an input from the database.
     *
     * @authenticated
     *
     * @urlParam input int required The input ID. Example: 1
     *
     * @response 200 {"message": "Input permanently deleted."}
     */
    public function forceDelete(Input $input): JsonResponse
    {
        $this->authorize('forceDelete', $input);

        $input->forceDelete();

        return response()->json([
            'message' => 'Input permanently deleted.',
        ], 200);
    }
}
