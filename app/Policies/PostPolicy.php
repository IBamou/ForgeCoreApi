<?php

namespace App\Policies;

use App\Models\Post;
use App\Models\User;
use Illuminate\Auth\Access\Response;

class PostPolicy
{
    public function view(User $user, Post $post): Response
    {
        return $user->is($post->createdBy)
            ? Response::allow()
            : Response::deny('You do not own this post.');
    }

    public function update(User $user, Post $post): Response
    {
        return $user->is($post->createdBy)
            ? Response::allow()
            : Response::deny('You do not own this post.');
    }

    public function updateStatus(User $user, Post $post): Response
    {
        return $user->is($post->createdBy)
            ? Response::allow()
            : Response::deny('You do not own this post.');
    }

    public function delete(User $user, Post $post): Response
    {
        return $user->is($post->createdBy)
            ? Response::allow()
            : Response::deny('You do not own this post.');
    }

    public function restore(User $user, Post $post): Response
    {
        return $user->is($post->createdBy)
            ? Response::allow()
            : Response::deny('You do not own this post.');
    }

    public function forceDelete(User $user, Post $post): Response
    {
        return $user->is($post->createdBy)
            ? Response::allow()
            : Response::deny('You do not own this post.');
    }

    public function retry(User $user, Post $post): Response
    {
        return $user->is($post->createdBy)
            ? Response::allow()
            : Response::deny('You do not own this post.');
    }
}
