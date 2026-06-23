<?php

namespace App\Http\Controllers;

use App\Http\Resources\InputResource;
use App\Models\Input;
use Illuminate\Http\Request;

class InputController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $user = auth()->user();

        $inputs = $user->inputs();


        $data =  [
            'inputs' => InputResource::collection($inputs)
        ];

        return response()->json($data);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|string',
            'raw_input' => 'required|string'
        ]);

        $input = Input::create($validated);

        $data = [
            'input' => InputResource::collection($input)
        ];

        return response()->json($data);
    }

    /**
     * Display the specified resource.
     */
    public function show(Input $input)
    {
        $this->authorize('view', $input);

        $data = [
            'input' => InputResource::collection($input)
        ];

        return response()->json($data);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Input $input)
    {
        $this->authorize('update', $input);

        $validated = $request->validate([
            'title' => 'sometimes|string',
            'raw_input' => 'somtimes|string'
        ]);

        $input->update($validated);

        $data = [
            'input' => InputResource::collection($input)
        ];

        return response()->json($data);

    }

    public function archive(Input $input)
    {
        $this->authorize('delete', $input);

        $input->delete();

        $data = [];

        return response()->json($data, 200);
    }

    public function restore(Input $input)
    {
        $this->authorize('restore', $input);

        $input->restore();

        $data = [
            'input' => inputResource::collection($input)
        ];

        return response()->json($data, 200);
    }

    public function forceDelete(Input $input)
    {
        $this->authorize('forceDelete', $input);

        $input->forceDelete();

        $data = [];

        return response()->json($data, 200);
    }
}
