<?php

namespace App\Policies;

use App\Models\User;
use App\Models\Project;

use Illuminate\Support\Facades\Auth;

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
     * Check if the user is a member of the project or an admin.
     *
     * @param User $user
     * @param Project $project
     * @return bool
     */
    public function viewProject(User $user, Project $project)
    {
        // Log or print statements for debugging
        Log::info("User ID: " . $user->id);
        Log::info("Is Admin: " . ($user->is_admin ? 'true' : 'false'));
        Log::info("Is Project Member: " . ($user->isProjectMember($project->id) ? 'true' : 'false'));
        Log::info("Is Public: " . ($project->is_public ? 'true' : 'false'));

        return $user->isProjectMember($project->id) || $user->is_admin || $project->is_public;
    }

    /**
     * Check if the user is a coordinator of the project or an admin.
     *
     * @param User $user
     * @param Project $project
     * @return bool
     */
    public function editProject(User $user, Project $project)
    {
        return $user->isCoordinator($project->id) || $user->is_admin;
    }

    /**
     * Determine whether the user can delete the project.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Project  $project
     * @return bool
     */
    public function deleteProject(User $user, Project $project)
    {
        // Check if the user is a coordinator for the project or admin
        return $user->isCoordinator($project->id) || $user->is_admin;
    }
}
