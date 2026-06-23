<?php

namespace App\Http\Controllers;

use App\Enums\PostStatus;
use App\Enums\ProcessStatus;
use App\Http\Requests\PostRequest\StorePostRequest;
use App\Http\Requests\PostRequest\UpdatePostRequest;
use App\Http\Resources\ConfigurationResource;
use App\Http\Resources\PostResource;
use App\Jobs\PostGeneration;
use App\Models\Configuration;
use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $user = auth()->user();

        $posts = $user->posts;

        $data = ['posts' => $posts];

        return response()->json($data, 200);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StorePostRequest $request)
    {
        $validated = $request->validated();

        $configuration = Configuration::firstOrCreate([
            'blueprint_id' => $validated['blueprint_id'],
            'input_id' => $validated['input_id'],
            'user_id' => auth()->id(),
        ]);

        $post = Post::create([
            'title' => $validated['title'],
            'configuration_id' => $configuration->id,
            'process_status' => ProcessStatus::Pending,
            'status' => PostStatus::InReview,
        ]);

        PostGeneration::dispatch($post);

        $data = [
            'configuration' => ConfigurationResource::collection($configuration),
            'post' => PostResource::collection($post),
        ];

        return response()->json($data, 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(Post $post)
    {
        $this->authorize('view', $post);

        $data = [
            'post' => $post,
        ];

        return response()->json($data, 200);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdatePostRequest $request, Post $post)
    {
        $this->authorize('update', $post);

        $validated = $request->validated();

        $post->update($validated);

        $data = [
            'post' => $post,
        ];

        return response()->json($data, 200);
    }

    public function updateStatus(Request $request, Post $post)
    {
        $this->authorize('updateStatus', $post);

        $validated = $request->validated();

        $post->update($validated);

        $data = [
            'post' => $post,
        ];

        return response()->json($data, 200);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function archive(Post $post)
    {
        $this->authorize('delete', $post);

        $post->delete();

        $data = [];

        return response()->json($data, 200);
    }

    public function restore(Post $post)
    {
        $this->authorize('restore', $post);

        $post->restore();

        $data = [];

        return response()->json($data, 200);
    }

    public function forceDelete(Post $post)
    {
        $this->authorize('forceDelete', $post);

        $post->forceDelete();

        $data = [];

        return response()->json($data, 200);
    }
}
