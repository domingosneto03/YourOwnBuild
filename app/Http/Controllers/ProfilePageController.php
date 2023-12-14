<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\View\View;
use Illuminate\Support\Facades\Auth;

use App\Models\User;

class ProfilePageController extends Controller
{
    public function show(string $id)
    {   
        // Check if the user is logged in.
        if (!Auth::check()) {
            // Not logged in, redirect to login.
            return redirect('/login');
        }
        else {
            $user = User::findOrFail($id);

            // Use the pages.cards template to display all cards.
            return view('pages.profilePage', [
                'user' => $user
            ]);
        }
    }

    public function showProfile(string $id)
    {   
        // Check if the user is logged in.
        if (!Auth::check()) {
            // Not logged in, redirect to login.
            return redirect('/login');
        }
        else {
            $user = User::findOrFail($id);

            // Use the pages.cards template to display all cards.
            return view('partials.userprofile', [
                'user' => $user
            ]);
        }
    }

    public function editShow(string $id)
    {   
        // Check if the user is logged in.
        if (!Auth::check()) {
            // Not logged in, redirect to login.
            return redirect('/login');
        }
        else {
            $user = User::findOrFail($id);

            // Use the pages.cards template to display all cards.
            return view('partials.editUserProfile', [
                'user' => $user
            ]);
        }
    }

    public function showInvitations(string $id): View
    {
        // Check if the user is logged in.
        if (!Auth::check()) {
            // Not logged in, redirect to login.
            return redirect('/login');
        }
    
        // Get the project.
        $user = User::findOrFail($id);
    
        // Use the partials.team template to display the team.
        return view('partials.invitations', [
            'user' => $user
        ]);
    }
}
