<?php

namespace App\Http\Controllers;

use App\Enums\PostStatus;
use App\Enums\ProcessStatus;
use App\Http\Requests\PostRequest\StorePostRequest;
use App\Http\Requests\PostRequest\UpdatePostRequest;
use App\Http\Requests\PostRequest\UpdatePostStatusRequest;
use App\Http\Resources\ConfigurationResource;
use App\Http\Resources\PostResource;
use App\Http\Traits\FiltersAndSorts;
use App\Jobs\PostGeneration;
use App\Models\Configuration;
use App\Models\Post;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PostController extends Controller
{
    use FiltersAndSorts;

    private array $postSearchable = ['title', 'hook_proposal', 'body_points'];

    public function index(Request $request): JsonResponse
    {
        $user = auth()->user();

        $query = $user->posts()->with(['configuration', 'createdBy']);

        $this->applySearch($query, $request, $this->postSearchable);

        if ($request->filled('status')) {
            $query->where('status', $request->str('status'));
        }

        if ($request->filled('process_status')) {
            $query->where('process_status', $request->str('process_status'));
        }

        $this->applySort($query, $request, ['created_at', 'updated_at', 'title', 'status']);

        $posts = $query->paginate($this->perPage($request));

        return response()->json(
            $this->paginatedResponse($posts, 'posts', PostResource::class),
            200
        );
    }

    public function archived(Request $request): JsonResponse
    {
        $user = auth()->user();

        $query = $user->posts()->onlyTrashed()->with(['configuration', 'createdBy']);

        $this->applySearch($query, $request, $this->postSearchable);

        $this->applySort($query, $request, ['created_at', 'updated_at', 'title']);

        $posts = $query->paginate($this->perPage($request));

        return response()->json(
            $this->paginatedResponse($posts, 'posts', PostResource::class),
            200
        );
    }

    public function store(StorePostRequest $request): JsonResponse
    {
        $validated = $request->validated();

        $post = DB::transaction(function () use ($validated) {
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

            return $post;
        });

        return response()->json([
            'message' => 'Post created successfully.',
            'configuration' => ConfigurationResource::make($post->configuration),
            'post' => PostResource::make($post),
        ], 201);
    }

    public function show(Post $post): JsonResponse
    {
        $this->authorize('view', $post);

        $post->load(['createdBy', 'configuration.blueprint', 'configuration.input']);

        return response()->json([
            'post' => PostResource::make($post),
        ], 200);
    }

    public function retry(Post $post): JsonResponse
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

    public function update(UpdatePostRequest $request, Post $post): JsonResponse
    {
        $this->authorize('update', $post);

        $validated = $request->validated();

        $post->update($validated);

        return response()->json([
            'message' => 'Post updated successfully.',
            'post' => PostResource::make($post),
        ], 200);
    }

    public function updateStatus(UpdatePostStatusRequest $request, Post $post): JsonResponse
    {
        $post->update($request->validated());

        return response()->json([
            'message' => 'Post status updated successfully.',
            'post' => PostResource::make($post),
        ], 200);
    }

    public function archive(Post $post): JsonResponse
    {
        $this->authorize('delete', $post);

        $post->delete();

        return response()->json([
            'message' => 'Post archived successfully.',
        ], 200);
    }

    public function restore(Post $post): JsonResponse
    {
        $this->authorize('restore', $post);

        $post->restore();

        return response()->json([
            'message' => 'Post restored successfully.',
            'post' => PostResource::make($post),
        ], 200);
    }

    public function forceDelete(Post $post): JsonResponse
    {
        $this->authorize('forceDelete', $post);

        $post->forceDelete();

        return response()->json([
            'message' => 'Post permanently deleted.',
        ], 200);
    }
}
