<?php

namespace App\Http\Controllers;

use App\Http\Requests\Blueprint\StoreBluePrintRequest;
use App\Http\Requests\Blueprint\UpdateBluePrintRequest;
use App\Http\Resources\BluePrintResource;
use App\Models\Blueprint;
use Illuminate\Http\Request;

class BluePrintController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $user = auth()->user();

        $blueprints = $user->bluePrints;

        $data = [
            'blueprints' => BluePrintResource::collection($blueprints)
        ];

        return response()->json($data, 200);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreBluePrintRequest $request)
    {
        $validated = $request->validated();

        $blueprint = Blueprint::create([
            ...$validated,
            'user_id' => auth()->id()
        ]);

        $data = [
            'blueprint' => BluePrintResource::collection($blueprint)
        ];

        return response()->json($data, 200);
    }

    /**
     * Display the specified resource.
     */
    public function show(Blueprint $blueprint)
    {
        $this->authorize('view', $blueprint);

        $data = [
            'blueprint' => BluePrintResource::collection($blueprint)
        ];

        return response()->json($data, 200);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateBluePrintRequest $request, Blueprint $blueprint)
    {
        $this->authorize('update', $blueprint);

        $validated = $request->validated();

        $blueprint->update($validated);

        $data = [
            'blueprint' => BluePrintResource::collection($blueprint)
        ];

        return response()->json($data, 200);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function archive(Blueprint $blueprint)
    {
        $this->authorize('delete', $blueprint);

        $blueprint->delete();

        $data = [];

        return response()->json($data, 200);
    }

    public function restore(Blueprint $blueprint)
    {
        $this->authorize('restore', $blueprint);

        $blueprint->restore();

        $data = [
            'blueprint' => BluePrintResource::collection($blueprint)
        ];

        return response()->json($data, 200);
    }

    public function forceDelete(Blueprint $blueprint)
    {
        $this->authorize('forceDelete', $blueprint);

        $blueprint->forceDelete();

        $data = [];

        return response()->json($data, 200);
    }
}
