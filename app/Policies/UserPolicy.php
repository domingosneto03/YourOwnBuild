<?php

namespace App\Policies;

use App\Models\User;
use App\Models\Project;

use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Auth;

class UserPolicy
{
    /**
     * Create a new policy instance.
     */
    public function __construct()
    {
        //
    }

    /**
     * Determine whether the user can edit their own profile.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\User  $profileUser
     * @return bool
     */
    public function editProfile(User $user, User $profileUser)
    {
        return $user->id === $profileUser->id;
    }

    /**
     * Determine whether the user can delete their own profile.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\User  $profileUser
     * @return bool
     */
    public function deleteProfile(User $user, User $profileUser)
    {
        return $user->id === $profileUser->id;
    }
}
