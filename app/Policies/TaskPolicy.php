<?php

namespace App\Policies;

use App\Models\User;
use App\Models\Task;

class TaskPolicy
{
    
    /**
     * Determine if the given user can delete the task.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Task  $task
     * @return bool
     */
    public function delete(User $user, Task $task)
    {
        $project = $task->project;
        // The creator of the task or a coordinator can delete the task
        return $user->id === $task->id_creator || $project->members->where('id_user', $user->id)->where('role', 'coordinator')->count() > 0;
    }

    /**
     * Determine if the given user can update the task.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Task  $task
     * @return bool
     */
    public function edit(User $user, Task $task)
    {
        // If the user is an admin, they cannot update the task
        if ($user->isAdmin()) {
            return false;
        }
    }

    /**
     * Determine if the given user can reassign an user to a task.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Task  $task
     * @return bool
     */
    public function reassign(User $user, Task $task)
    {
        $project = $task->project;
        // The creator of the task or a coordinator can delete the task
        return $user->id === $task->id_creator || $project->members->where('id_user', $user->id)->where('role', 'coordinator')->count() > 0;
    }
}

