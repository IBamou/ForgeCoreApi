<?php

namespace App\Http\Controllers;

use App\Http\Resources\BluePrintResource;
use App\Http\Resources\ConversationResource;
use App\Http\Resources\InputResource;
use App\Http\Resources\PostResource;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

/**
 * @group Search
 *
 * Global search across posts, blueprints, inputs, and conversations.
 */
class SearchController extends Controller
{
    /**
     * Global search
     *
     * Searches across the authenticated user's resources. Results can be filtered by type.
     * Each result type returns up to `per_type` items (default 5, max 20).
     *
     * @authenticated
     *
     * @queryParam q string required Search query (min 2 characters). Example: AI
     * @queryParam type string Filter by resource type (posts, blueprints, inputs, conversations). Example: posts
     * @queryParam per_type int Items per result type (1-20). Example: 5
     *
     * @response 200 scenario="success" {
     *   "query": "AI",
     *   "type": null,
     *   "results": {
     *     "posts": {"total": 2, "items": [{"id": 1, "title": "AI Post", ...}]},
     *     "blueprints": {"total": 1, "items": [{"id": 1, "name": "AI Blueprint", ...}]},
     *     "inputs": {"total": 0, "items": []},
     *     "conversations": {"total": 0, "items": []}
     *   }
     * }
     * @response 422 scenario="validation error" {
     *   "message": "Validation failed.",
     *   "errors": {"q": ["The q field is required."]}
     * }
     */
    public function index(Request $request): JsonResponse
    {
        $request->validate([
            'q' => ['required', 'string', 'min:2', 'max:100'],
            'type' => ['sometimes', 'string', 'in:posts,blueprints,inputs,conversations'],
        ]);

        $q = $request->str('q');
        $type = $request->str('type');
        $user = auth()->user();
        $perType = max(1, min(20, (int) $request->integer('per_type', 5)));

        $results = [];

        if (! $type || $type === 'posts') {
            $posts = $user->posts()
                ->where(function ($query) use ($q) {
                    $query->where('title', 'like', "%{$q}%")
                        ->orWhere('hook_proposal', 'like', "%{$q}%")
                        ->orWhere('body_points', 'like', "%{$q}%");
                })
                ->with(['configuration.blueprint', 'configuration.input', 'createdBy'])
                ->orderByDesc('created_at')
                ->take($perType)
                ->get();

            $results['posts'] = [
                'total' => $posts->count(),
                'items' => PostResource::collection($posts),
            ];
        }

        if (! $type || $type === 'blueprints') {
            $blueprints = $user->bluePrints()
                ->where(function ($query) use ($q) {
                    $query->where('name', 'like', "%{$q}%")
                        ->orWhere('description', 'like', "%{$q}%")
                        ->orWhere('tone', 'like', "%{$q}%");
                })
                ->with('createdBy')
                ->orderByDesc('created_at')
                ->take($perType)
                ->get();

            $results['blueprints'] = [
                'total' => $blueprints->count(),
                'items' => BluePrintResource::collection($blueprints),
            ];
        }

        if (! $type || $type === 'inputs') {
            $inputs = $user->inputs()
                ->where(function ($query) use ($q) {
                    $query->where('title', 'like', "%{$q}%")
                        ->orWhere('raw_input', 'like', "%{$q}%");
                })
                ->with('createdBy')
                ->orderByDesc('created_at')
                ->take($perType)
                ->get();

            $results['inputs'] = [
                'total' => $inputs->count(),
                'items' => InputResource::collection($inputs),
            ];
        }

        if (! $type || $type === 'conversations') {
            $conversations = $user->conversations()
                ->where('title', 'like', "%{$q}%")
                ->with('messages')
                ->orderByDesc('created_at')
                ->take($perType)
                ->get();

            $results['conversations'] = [
                'total' => $conversations->count(),
                'items' => ConversationResource::collection($conversations),
            ];
        }

        return response()->json([
            'query' => $q,
            'type' => $type ? $type->toString() : null,
            'results' => $results,
        ], 200);
    }
}
