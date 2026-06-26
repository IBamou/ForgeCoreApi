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

class ConversationController extends Controller
{
    use FiltersAndSorts;

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

    public function show(Conversation $conversation): JsonResponse
    {
        $this->authorize('view', $conversation);

        $conversation->load('messages');

        return response()->json([
            'conversation' => ConversationResource::make($conversation),
        ], 200);
    }

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

        $response = $client->prompt($agent, $validated['content']);

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

    public function archive(Conversation $conversation): JsonResponse
    {
        $this->authorize('delete', $conversation);

        $conversation->delete();

        return response()->json([
            'message' => 'Conversation archived successfully.',
        ], 200);
    }

    public function restore(Conversation $conversation): JsonResponse
    {
        $this->authorize('restore', $conversation);

        $conversation->restore();

        return response()->json([
            'message' => 'Conversation restored successfully.',
            'conversation' => ConversationResource::make($conversation),
        ], 200);
    }

    public function forceDelete(Conversation $conversation): JsonResponse
    {
        $this->authorize('forceDelete', $conversation);

        $conversation->forceDelete();

        return response()->json([
            'message' => 'Conversation permanently deleted.',
        ], 200);
    }
}
