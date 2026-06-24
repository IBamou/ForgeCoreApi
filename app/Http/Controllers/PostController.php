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
use Illuminate\Validation\Rule;

class PostController extends Controller
{
    public function index()
    {
        $user = auth()->user();

        $posts = $user->posts()->with(['configuration', 'createdBy'])->get();

        $data = ['posts' => PostResource::collection($posts)];

        return response()->json($data, 200);
    }

    public function archived()
    {
        $user = auth()->user();

        $posts = $user->posts()->onlyTrashed()->with(['configuration', 'createdBy'])->get();

        $data = ['posts' => PostResource::collection($posts)];

        return response()->json($data, 200);
    }

    public function store(StorePostRequest $request)
    {
        $validated = $request->validated();

        $configuration = Configuration::firstOrCreate([
            'blueprint_id' => $validated['blueprint_id'],
            'input_id' => $validated['input_id'],
            'user_id' => auth()->id(),
        ]);

        $post = Post::create([
            'user_id' => auth()->id(),
            'title' => $validated['title'],
            'configuration_id' => $configuration->id,
            'process_status' => ProcessStatus::Pending,
            'status' => PostStatus::InReview,
        ]);

        $configuration->load(['blueprint', 'input']);

        PostGeneration::dispatch($post);

        return response()->json([
            'message' => 'Post created successfully.',
            'configuration' => ConfigurationResource::make($configuration),
            'post' => PostResource::make($post),
        ], 201);
    }

    public function show(Post $post)
    {
        $this->authorize('view', $post);

        $post->load(['createdBy', 'configuration.blueprint', 'configuration.input']);

        return response()->json([
            'post' => PostResource::make($post),
        ], 200);
    }

    public function retry(Post $post)
    {
        $this->authorize('retry', $post);

        $post->update([
            'process_status' => ProcessStatus::Pending,
        ]);

        PostGeneration::dispatch($post);

        return response()->json([
            'message' => 'Post queued for regeneration.',
            'post' => PostResource::make($post),
        ], 201);
    }

    public function update(UpdatePostRequest $request, Post $post)
    {
        $this->authorize('update', $post);

        $validated = $request->validated();

        $post->update($validated);

        return response()->json([
            'message' => 'Post updated successfully.',
            'post' => PostResource::make($post),
        ], 200);
    }

    public function updateStatus(Request $request, Post $post)
    {
        $this->authorize('updateStatus', $post);

        $validated = $request->validate([
            'status' => [
                'sometimes',
                'string',
                Rule::enum(PostStatus::class),
            ],
        ]);

        $post->update($validated);

        return response()->json([
            'message' => 'Post status updated successfully.',
            'post' => PostResource::make($post),
        ], 200);
    }

    public function archive(Post $post)
    {
        $this->authorize('delete', $post);

        $post->delete();

        return response()->json([
            'message' => 'Post archived successfully.',
        ], 200);
    }

    public function restore(Post $post)
    {
        $this->authorize('restore', $post);

        $post->restore();

        return response()->json([
            'message' => 'Post restored successfully.',
            'post' => PostResource::make($post),
        ], 200);
    }

    public function forceDelete(Post $post)
    {
        $this->authorize('forceDelete', $post);

        $post->forceDelete();

        return response()->json([
            'message' => 'Post permanently deleted.',
        ], 200);
    }
}
