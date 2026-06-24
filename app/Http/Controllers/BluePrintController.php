<?php

namespace App\Http\Controllers;

use App\Http\Requests\BlueprintRequest\StoreBluePrintRequest;
use App\Http\Requests\BlueprintRequest\UpdateBluePrintRequest;
use App\Http\Resources\BluePrintResource;
use App\Models\Blueprint;

class BluePrintController extends Controller
{
    public function index()
    {
        $user = auth()->user();

        $blueprints = $user->bluePrints()->with('createdBy')->get();

        return response()->json([
            'blueprints' => BluePrintResource::collection($blueprints),
        ], 200);
    }

    public function archived()
    {
        $user = auth()->user();

        $blueprints = $user->bluePrints()->onlyTrashed()->with('createdBy')->get();

        return response()->json([
            'blueprints' => BluePrintResource::collection($blueprints),
        ], 200);
    }

    public function store(StoreBluePrintRequest $request)
    {
        $validated = $request->validated();

        $blueprint = Blueprint::create([
            ...$validated,
            'user_id' => auth()->id(),
        ]);

        return response()->json([
            'message' => 'Blueprint created successfully.',
            'blueprint' => BluePrintResource::make($blueprint),
        ], 201);
    }

    public function show(Blueprint $blueprint)
    {
        $this->authorize('view', $blueprint);

        $blueprint->load('createdBy');

        return response()->json([
            'blueprint' => BluePrintResource::make($blueprint),
        ], 200);
    }

    public function update(UpdateBluePrintRequest $request, Blueprint $blueprint)
    {
        $this->authorize('update', $blueprint);

        $validated = $request->validated();

        $blueprint->update($validated);

        return response()->json([
            'message' => 'Blueprint updated successfully.',
            'blueprint' => BluePrintResource::make($blueprint),
        ], 200);
    }

    public function archive(Blueprint $blueprint)
    {
        $this->authorize('delete', $blueprint);

        $blueprint->delete();

        return response()->json([
            'message' => 'Blueprint archived successfully.',
        ], 200);
    }

    public function restore(Blueprint $blueprint)
    {
        $this->authorize('restore', $blueprint);

        $blueprint->restore();

        return response()->json([
            'message' => 'Blueprint restored successfully.',
            'blueprint' => BluePrintResource::make($blueprint),
        ], 200);
    }

    public function forceDelete(Blueprint $blueprint)
    {
        $this->authorize('forceDelete', $blueprint);

        $blueprint->forceDelete();

        return response()->json([
            'message' => 'Blueprint permanently deleted.',
        ], 200);
    }
}
