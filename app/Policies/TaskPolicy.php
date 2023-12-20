<?php

namespace App\Policies;

use App\Models\User;

class TaskPolicy
{
    /**
     * Create a new policy instance.
     */
    public function __construct()
    {
        //
    }

    /**
     * Determine whether the user can view the task.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Task  $task
     * @return mixed
     */
    public function view(User $user, Task $task)
    {
        // Check if the user is a member of the project associated with the task
        if ($user->isProjectMember($task->id_project)) {
            return true;
        }

        // Check if the user is an admin
        if ($user->is_admin) {
            return true;
        }

        return false;
    }

    
}
