<?php

namespace App\Policies;

use App\Models\Input;
use App\Models\User;

class InputPolicy
{
    /**
     * Determine whether the user can view the model.
     */
    public function view(User $user, Input $input): bool
    {
        return $user->is($input->createdBy);
    }

    /**
     * Determine whether the user can update the model.
     */
    public function update(User $user, Input $input): bool
    {
        return $user->is($input->createdBy);
    }

    /**
     * Determine whether the user can delete the model.
     */
    public function delete(User $user, Input $input): bool
    {
        return $user->is($input->createdBy);
    }

    /**
     * Determine whether the user can restore the model.
     */
    public function restore(User $user, Input $input): bool
    {
        return $user->is($input->createdBy);;
    }

    /**
     * Determine whether the user can permanently delete the model.
     */
    public function forceDelete(User $user, Input $input): bool
    {
        return $user->is($input->createdBy);
    }

}
