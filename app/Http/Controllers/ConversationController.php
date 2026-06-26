<?php

namespace App\Http\Controllers;

use App\Ai\Agents\ConversationAgent;
use App\Http\Requests\ConversationRequest\SendConversationRequest;
use App\Http\Requests\ConversationRequest\StoreConversationRequest;
use App\Http\Resources\ConversationResource;
use App\Http\Resources\MessageResource;
use App\Http\Traits\FiltersAndSorts;
use App\Models\Conversation;
use App\Models\Message;
use App\Models\Post;
use App\Services\AiClient;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Laravel\Ai\Messages\Message as AiMessage;

/**
 * @group Conversations
 *
 * Chat with the AI assistant to refine and iterate on your post content.
 * Conversations are tied to a specific post and allow back-and-forth editing of hooks, body points, and hashtags.
 */
class ConversationController extends Controller
{
    use FiltersAndSorts;

    /**
     * List conversations
     *
     * Returns a paginated list of conversations for the authenticated user.
     *
     * @authenticated
     *
     * @queryParam page int Page number. Example: 1
     * @queryParam per_page int Items per page (1-100). Example: 15
     * @queryParam search string Search by title. Example: My Chat
     * @queryParam post_id int Filter by associated post ID. Example: 1
     * @queryParam sort string Sort by field (created_at, updated_at, title). Example: created_at
     * @queryParam direction string Sort direction (asc, desc). Example: desc
     *
     * @response 200 scenario="success" {
     *   "conversations": [{"id": "uuid", "title": "My Chat", ...}],
     *   "meta": {"current_page": 1, "last_page": 1, "per_page": 15, "total": 1}
     * }
     */
    public function index(Request $request): JsonResponse
    {
        $user = auth()->user();

        $query = $user->conversations()->with('messages');

        $this->applySearch($query, $request, ['title']);

        if ($postId = $request->integer('post_id')) {
            $query->where('post_id', $postId);
        }

        $this->applySort($query, $request, ['created_at', 'updated_at', 'title']);

        $conversations = $query->paginate($this->perPage($request));

        return response()->json(
            $this->paginatedResponse($conversations, 'conversations', ConversationResource::class),
            200
        );
    }

    /**
     * List archived conversations
     *
     * Returns a paginated list of soft-deleted conversations.
     *
     * @authenticated
     *
     * @queryParam page int Page number. Example: 1
     * @queryParam per_page int Items per page (1-100). Example: 15
     * @queryParam search string Search by title. Example: My Chat
     * @queryParam sort string Sort by field (created_at, updated_at, title). Example: created_at
     * @queryParam direction string Sort direction (asc, desc). Example: desc
     *
     * @response 200 scenario="success" {
     *   "conversations": [{"id": "uuid", "title": "My Chat", ...}],
     *   "meta": {"current_page": 1, "last_page": 1, "per_page": 15, "total": 1}
     * }
     */
    public function archived(Request $request): JsonResponse
    {
        $user = auth()->user();

        $query = $user->conversations()->onlyTrashed()->with('messages');

        $this->applySearch($query, $request, ['title']);

        $this->applySort($query, $request, ['created_at', 'updated_at', 'title']);

        $conversations = $query->paginate($this->perPage($request));

        return response()->json(
            $this->paginatedResponse($conversations, 'conversations', ConversationResource::class),
            200
        );
    }

    /**
     * Create a conversation
     *
     * Creates a new conversation for AI chat.
     *
     * @authenticated
     *
     * @response 201 scenario="success" {
     *   "message": "Conversation created successfully.",
     *   "conversation": {"id": "uuid", "title": "My Chat", ...}
     * }
     */
    public function store(StoreConversationRequest $request): JsonResponse
    {
        $validated = $request->validated();

        $conversation = Conversation::create([
            ...$validated,
            'user_id' => auth()->id(),
        ]);

        return response()->json([
            'message' => 'Conversation created successfully.',
            'conversation' => ConversationResource::make($conversation),
        ], 201);
    }

    /**
     * Show a conversation
     *
     * Returns the details and messages of a specific conversation.
     *
     * @authenticated
     *
     * @urlParam conversation string required The conversation UUID. Example: 550e8400-e29b-41d4-a716-446655440000
     *
     * @response 200 scenario="success" {
     *   "conversation": {"id": "uuid", "title": "My Chat", "messages": [...], ...}
     * }
     */
    public function show(Conversation $conversation): JsonResponse
    {
        $this->authorize('view', $conversation);

        $conversation->load('messages');

        return response()->json([
            'conversation' => ConversationResource::make($conversation),
        ], 200);
    }

    /**
     * Send a message
     *
     * Sends a message in a conversation and gets an AI-generated reply.
     *
     * @authenticated
     *
     * @urlParam conversation string required The conversation UUID. Example: 550e8400-e29b-41d4-a716-446655440000
     *
     * @response 201 scenario="success" {
     *   "message": "Message sent successfully.",
     *   "user_message": {"id": "uuid", "role": "user", "content": "Hello", ...},
     *   "assistant_message": {"id": "uuid", "role": "assistant", "content": "Hi! How can I help?", ...}
     * }
     * @response 429 scenario="ai rate limited" {"message": "AI service is currently rate limited. Please try again later."}
     */
    public function send(SendConversationRequest $request, Conversation $conversation): JsonResponse
    {
        $this->authorize('sendMessage', $conversation);

        $validated = $request->validated();

        $userMessage = Message::create([
            'conversation_id' => $conversation->id,
            'role' => 'user',
            'content' => $validated['content'],
            'agent' => ConversationAgent::class,
            'attachments' => '[]',
            'tool_calls' => '[]',
            'tool_results' => '[]',
            'usage' => '[]',
            'meta' => '[]',
        ]);

        $history = $conversation->messages()->orderBy('created_at')->get();

        $conversationMessages = $history->map(fn ($msg) => new AiMessage(
            role: $msg->role,
            content: $msg->content,
        ))->toArray();

        $postData = null;
        if ($conversation->post_id) {
            $post = Post::with(['configuration.blueprint', 'configuration.input'])->find($conversation->post_id);
            if ($post) {
                $postData = [
                    'id' => $post->id,
                    'title' => $post->title,
                    'hook_proposal' => $post->hook_proposal,
                    'body_points' => $post->body_points,
                    'suggested_hashtags' => $post->suggested_hashtags,
                    'technical_readability_score' => $post->technical_readability_score,
                    'tone_compliance_justification' => $post->tone_compliance_justification,
                ];
            }
        }

        $agent = new ConversationAgent($conversationMessages, $postData);

        $client = app(AiClient::class);

        try {
            $response = $client->prompt($agent, $validated['content']);
        } catch (\RuntimeException $e) {
            return response()->json([
                'message' => $e->getMessage(),
                'user_message' => MessageResource::make($userMessage),
            ], $e->getCode() >= 400 ? $e->getCode() : 500);
        }

        $assistantMessage = Message::create([
            'conversation_id' => $conversation->id,
            'role' => 'assistant',
            'content' => $response,
            'agent' => ConversationAgent::class,
            'attachments' => '[]',
            'tool_calls' => '[]',
            'tool_results' => '[]',
            'usage' => '[]',
            'meta' => '[]',
        ]);

        return response()->json([
            'message' => 'Message sent successfully.',
            'user_message' => MessageResource::make($userMessage),
            'assistant_message' => MessageResource::make($assistantMessage),
        ], 201);
    }

    /**
     * Archive a conversation
     *
     * Soft-deletes a specific conversation.
     *
     * @authenticated
     *
     * @urlParam conversation string required The conversation UUID. Example: 550e8400-e29b-41d4-a716-446655440000
     *
     * @response 200 {"message": "Conversation archived successfully."}
     */
    public function archive(Conversation $conversation): JsonResponse
    {
        $this->authorize('delete', $conversation);

        $conversation->delete();

        return response()->json([
            'message' => 'Conversation archived successfully.',
        ], 200);
    }

    /**
     * Restore a conversation
     *
     * Restores a soft-deleted conversation.
     *
     * @authenticated
     *
     * @urlParam conversation string required The conversation UUID. Example: 550e8400-e29b-41d4-a716-446655440000
     *
     * @response 200 {"message": "Conversation restored successfully.", "conversation": {"id": "uuid", ...}}
     */
    public function restore(Conversation $conversation): JsonResponse
    {
        $this->authorize('restore', $conversation);

        $conversation->restore();

        return response()->json([
            'message' => 'Conversation restored successfully.',
            'conversation' => ConversationResource::make($conversation),
        ], 200);
    }

    /**
     * Permanently delete a conversation
     *
     * Force-deletes a conversation from the database.
     *
     * @authenticated
     *
     * @urlParam conversation string required The conversation UUID. Example: 550e8400-e29b-41d4-a716-446655440000
     *
     * @response 200 {"message": "Conversation permanently deleted."}
     */
    public function forceDelete(Conversation $conversation): JsonResponse
    {
        $this->authorize('forceDelete', $conversation);

        $conversation->forceDelete();

        return response()->json([
            'message' => 'Conversation permanently deleted.',
        ], 200);
    }
}
