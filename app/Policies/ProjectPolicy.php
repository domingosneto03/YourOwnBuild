<?php

namespace App\Policies;

use App\Models\User;
use App\Models\Project;

class ProjectPolicy
{
    /**
     * Determine if the given user can view the project.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Project  $project
     * @return bool
     */
    public function view(User $user, Project $project)
    {
        // Check if the user is the creator or a member of the project
        return $user->id === $project->id_creator || $project->members->contains($user);
    }

    /**
     * Determine if the given user can edit the project.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Project  $project
     * @return bool
     */

    public function edit(User $user, Project $project)
    {
        return $user->id === $project->id_creator || $project->members->where('id_user', $user->id)->where('role', 'coordinator')->count() > 0;
    }

    /**
     * Determine if the given user can delete the project.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Project  $project
     * @return bool
     */
    public function delete(User $user, Project $project)
    {
        // Check if the user is the creator of the project
        return $user->id === $project->id_creator || $project->members->where('id_user', $user->id)->where('role', 'coordinator')->count() > 0;
    }

    /**
     * Determine if the given user can invite a user to the project.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Project  $project
     * @return bool
     */
    public function invite(User $user, Project $project)
    {
        // Check if the user is the creator of the project
        return $user->id === $project->id_creator || $project->members->where('id_user', $user->id)->where('role', 'coordinator')->count() > 0;
    }

     /**
     * Determine if the given user can remove a user from the project.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Project  $project
     * @return bool
     */
    public function remove(User $user, Project $project)
    {
        // Check if the user is the creator of the project
        return $user->id === $project->id_creator || $project->members->where('id_user', $user->id)->where('role', 'coordinator')->count() > 0;
    }

    /**
     * Determine if the given user can handle requests to join the project.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Project  $project
     * @return bool
     */
    public function handleRequests(User $user, Project $project)
    {
        // Check if the user is the creator of the project
        return $user->id === $project->id_creator || $project->members->where('id_user', $user->id)->where('role', 'coordinator')->count() > 0;
    }
}

