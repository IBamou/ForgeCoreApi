<?php

namespace App\Policies;

use App\Models\Input;
use App\Models\User;
use Illuminate\Auth\Access\Response;

class InputPolicy
{
    public function view(User $user, Input $input): Response
    {
        return $user->is($input->createdBy)
            ? Response::allow()
            : Response::deny('You do not own this input.');
    }

    public function update(User $user, Input $input): Response
    {
        return $user->is($input->createdBy)
            ? Response::allow()
            : Response::deny('You do not own this input.');
    }

    public function delete(User $user, Input $input): Response
    {
        return $user->is($input->createdBy)
            ? Response::allow()
            : Response::deny('You do not own this input.');
    }

    public function restore(User $user, Input $input): Response
    {
        return $user->is($input->createdBy)
            ? Response::allow()
            : Response::deny('You do not own this input.');
    }

    public function forceDelete(User $user, Input $input): Response
    {
        return $user->is($input->createdBy)
            ? Response::allow()
            : Response::deny('You do not own this input.');
    }
}
