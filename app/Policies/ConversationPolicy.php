<?php

namespace App\Policies;

use App\Models\Conversation;
use App\Models\User;
use Illuminate\Auth\Access\Response;

class ConversationPolicy
{
    public function view(User $user, Conversation $conversation): Response
    {
        return $user->is($conversation->user)
            ? Response::allow()
            : Response::deny('You do not own this conversation.');
    }

    public function create(User $user): bool
    {
        return true;
    }

    public function delete(User $user, Conversation $conversation): Response
    {
        return $user->is($conversation->user)
            ? Response::allow()
            : Response::deny('You do not own this conversation.');
    }

    public function restore(User $user, Conversation $conversation): Response
    {
        return $user->is($conversation->user)
            ? Response::allow()
            : Response::deny('You do not own this conversation.');
    }

    public function forceDelete(User $user, Conversation $conversation): Response
    {
        return $user->is($conversation->user)
            ? Response::allow()
            : Response::deny('You do not own this conversation.');
    }

    public function sendMessage(User $user, Conversation $conversation): Response
    {
        return $user->is($conversation->user)
            ? Response::allow()
            : Response::deny('You do not own this conversation.');
    }
}
