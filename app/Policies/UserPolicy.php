<?php

namespace App\Policies;

use App\Models\User;
use App\Models\Project;

use Illuminate\Support\Facades\Auth;

class UserPolicy
{
    /**
     * Determine if the given user can view any projects.
     *
     * @param  \App\Models\User  $user
     * @return bool
     */
    public function viewAnyProjects(User $user)
    {
        return $user->isAdmin();
    }

    /**
     * Determine if the given user can block a user.
     *
     * @param  \App\Models\User  $user
     * @return bool
     */
    public function block(User $user)
    {
        return $user->isAdmin();
    }

    /**
     * Determine if the given user can perform the action.
     *
     * @param  \App\Models\User  $user
     * @return bool
     */

    public function canPerformAction(User $user)
    {
        // Check if the user is blocked
        if ($user->is_blocked) {
            return false;
        }
        return true;  // Allow the action by default
    }


}
