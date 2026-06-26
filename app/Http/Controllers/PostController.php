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

/**
 * @group Posts
 *
 * APIs for managing AI-generated posts.
 */
class PostController extends Controller
{
    use FiltersAndSorts;

    private array $postSearchable = ['title', 'hook_proposal', 'body_points'];

    /**
     * List posts
     *
     * Returns a paginated list of posts for the authenticated user.
     *
     * @authenticated
     *
     * @queryParam page int Page number. Example: 1
     * @queryParam per_page int Items per page (1-100). Example: 15
     * @queryParam search string Search by title, hook proposal or body points. Example: AI
     * @queryParam status string Filter by status (in_review, draft, posted, archived). Example: draft
     * @queryParam process_status string Filter by process status (pending, processing, completed, failed). Example: completed
     * @queryParam sort string Sort by field (created_at, updated_at, title, status). Example: created_at
     * @queryParam direction string Sort direction (asc, desc). Example: desc
     *
     * @response 200 scenario="success" {
     *   "posts": [{"id": 1, "title": "My Post", ...}],
     *   "meta": {"current_page": 1, "last_page": 1, "per_page": 15, "total": 1}
     * }
     */
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

    /**
     * List archived posts
     *
     * Returns a paginated list of soft-deleted posts for the authenticated user.
     *
     * @authenticated
     *
     * @queryParam page int Page number. Example: 1
     * @queryParam per_page int Items per page (1-100). Example: 15
     * @queryParam search string Search by title, hook proposal or body points. Example: AI
     * @queryParam sort string Sort by field (created_at, updated_at, title). Example: created_at
     * @queryParam direction string Sort direction (asc, desc). Example: desc
     *
     * @response 200 scenario="success" {
     *   "posts": [{"id": 1, "title": "My Post", ...}],
     *   "meta": {"current_page": 1, "last_page": 1, "per_page": 15, "total": 1}
     * }
     */
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

    /**
     * Create a post
     *
     * Creates a new post with a blueprint and input, then queues AI generation.
     *
     * @authenticated
     *
     * @response 201 scenario="success" {
     *   "message": "Post created successfully.",
     *   "configuration": {"id": 1, "blueprint_id": 1, "input_id": 1, ...},
     *   "post": {"id": 1, "title": "My Post", "process_status": "pending", "status": "in_review", ...}
     * }
     * @response 422 scenario="validation error" {
     *   "message": "Validation failed.",
     *   "errors": {"blueprint_id": ["The selected blueprint is invalid or not active."]}
     * }
     */
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

    /**
     * Show a post
     *
     * Returns the details of a specific post.
     *
     * @authenticated
     *
     * @urlParam post int required The post ID. Example: 1
     *
     * @response 200 scenario="success" {
     *   "post": {"id": 1, "title": "My Post", "process_status": "completed", ...}
     * }
     * @response 403 {"message": "Forbidden."}
     * @response 404 {"message": "Resource not found."}
     */
    public function show(Post $post): JsonResponse
    {
        $this->authorize('view', $post);

        $post->load(['createdBy', 'configuration.blueprint', 'configuration.input']);

        return response()->json([
            'post' => PostResource::make($post),
        ], 200);
    }

    /**
     * Retry post generation
     *
     * Resets the process status to pending and re-queues AI generation.
     *
     * @authenticated
     *
     * @urlParam post int required The post ID. Example: 1
     *
     * @response 201 {"message": "Post queued for regeneration.", "post": {"id": 1, ...}}
     */
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

    /**
     * Update a post
     *
     * Updates the content fields of a specific post.
     *
     * @authenticated
     *
     * @urlParam post int required The post ID. Example: 1
     *
     * @response 200 {"message": "Post updated successfully.", "post": {"id": 1, ...}}
     */
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

    /**
     * Update post status
     *
     * Updates only the status of a specific post.
     *
     * @authenticated
     *
     * @urlParam post int required The post ID. Example: 1
     *
     * @response 200 {"message": "Post status updated successfully.", "post": {"id": 1, ...}}
     */
    public function updateStatus(UpdatePostStatusRequest $request, Post $post): JsonResponse
    {
        $post->update($request->validated());

        return response()->json([
            'message' => 'Post status updated successfully.',
            'post' => PostResource::make($post),
        ], 200);
    }

    /**
     * Archive a post
     *
     * Soft-deletes a specific post.
     *
     * @authenticated
     *
     * @urlParam post int required The post ID. Example: 1
     *
     * @response 200 {"message": "Post archived successfully."}
     */
    public function archive(Post $post): JsonResponse
    {
        $this->authorize('delete', $post);

        $post->delete();

        return response()->json([
            'message' => 'Post archived successfully.',
        ], 200);
    }

    /**
     * Restore a post
     *
     * Restores a soft-deleted post.
     *
     * @authenticated
     *
     * @urlParam post int required The post ID. Example: 1
     *
     * @response 200 {"message": "Post restored successfully.", "post": {"id": 1, ...}}
     */
    public function restore(Post $post): JsonResponse
    {
        $this->authorize('restore', $post);

        $post->restore();

        return response()->json([
            'message' => 'Post restored successfully.',
            'post' => PostResource::make($post),
        ], 200);
    }

    /**
     * Permanently delete a post
     *
     * Force-deletes a post from the database.
     *
     * @authenticated
     *
     * @urlParam post int required The post ID. Example: 1
     *
     * @response 200 {"message": "Post permanently deleted."}
     */
    public function forceDelete(Post $post): JsonResponse
    {
        $this->authorize('forceDelete', $post);

        $post->forceDelete();

        return response()->json([
            'message' => 'Post permanently deleted.',
        ], 200);
    }
}
