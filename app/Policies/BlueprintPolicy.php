<?php

namespace App\Policies;

use App\Models\Blueprint;
use App\Models\User;
use Illuminate\Auth\Access\Response;

class BlueprintPolicy
{
    public function view(User $user, Blueprint $blueprint): Response
    {
        return $user->is($blueprint->createdBy)
            ? Response::allow()
            : Response::deny('You do not own this blueprint.');
    }

    public function update(User $user, Blueprint $blueprint): Response
    {
        return $user->is($blueprint->createdBy)
            ? Response::allow()
            : Response::deny('You do not own this blueprint.');
    }

    public function delete(User $user, Blueprint $blueprint): Response
    {
        return $user->is($blueprint->createdBy)
            ? Response::allow()
            : Response::deny('You do not own this blueprint.');
    }

    public function restore(User $user, Blueprint $blueprint): Response
    {
        return $user->is($blueprint->createdBy)
            ? Response::allow()
            : Response::deny('You do not own this blueprint.');
    }

    public function forceDelete(User $user, Blueprint $blueprint): Response
    {
        return $user->is($blueprint->createdBy)
            ? Response::allow()
            : Response::deny('You do not own this blueprint.');
    }
}
