<?php

namespace App\Http\Controllers;

use App\Http\Resources\InputResource;
use App\Models\Input;
use Illuminate\Http\Request;

class InputController extends Controller
{
    public function index()
    {
        $user = auth()->user();

        $inputs = $user->inputs()->with('createdBy')->get();

        return response()->json([
            'inputs' => InputResource::collection($inputs),
        ], 200);
    }

    public function archived()
    {
        $user = auth()->user();

        $inputs = $user->inputs()->onlyTrashed()->with('createdBy')->get();

        return response()->json([
            'inputs' => InputResource::collection($inputs),
        ], 200);
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|string',
            'raw_input' => 'required|string',
        ]);

        $input = Input::create([
            ...$validated,
            'user_id' => auth()->id(),
        ]);

        return response()->json([
            'message' => 'Input created successfully.',
            'input' => InputResource::make($input),
        ], 201);
    }

    public function show(Input $input)
    {
        $this->authorize('view', $input);

        $input->load('createdBy');

        return response()->json([
            'input' => InputResource::make($input),
        ], 200);
    }

    public function update(Request $request, Input $input)
    {
        $this->authorize('update', $input);

        $validated = $request->validate([
            'title' => 'sometimes|string',
            'raw_input' => 'sometimes|string',
        ]);

        $input->update($validated);

        return response()->json([
            'message' => 'Input updated successfully.',
            'input' => InputResource::make($input),
        ], 200);
    }

    public function archive(Input $input)
    {
        $this->authorize('delete', $input);

        $input->delete();

        return response()->json([
            'message' => 'Input archived successfully.',
        ], 200);
    }

    public function restore(Input $input)
    {
        $this->authorize('restore', $input);

        $input->restore();

        return response()->json([
            'message' => 'Input restored successfully.',
            'input' => InputResource::make($input),
        ], 200);
    }

    public function forceDelete(Input $input)
    {
        $this->authorize('forceDelete', $input);

        $input->forceDelete();

        return response()->json([
            'message' => 'Input permanently deleted.',
        ], 200);
    }
}
