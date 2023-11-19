<?php

namespace App\Policies;

use App\Models\User;
use App\Models\Project;

class ItemPolicy
{
    /**
     * Create a new policy instance.
     */
    public function __construct()
    {
        //
    }

    /**
     * Determine if a given project can be shown to a user.
     */
    public function show(User $user, Project $project): bool
    {
        // Only a project member can see a project.
        return $user->id === $card->user_id;
    }

    /**
     * Determine if all projects can be listed by a user.
     */
    public function list(User $user): bool
    {
        // Any (authenticated) user can list its own projects.
        return Auth::check();
    }
}
