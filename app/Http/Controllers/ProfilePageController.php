<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\View\View;
use Illuminate\Support\Facades\Auth;

use App\Models\User;

class ProfilePageController extends Controller
{
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
            return view('pages.profilePagePage', [
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
            return view('pages.profilePageEditPage', [
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
    
        $user = User::findOrFail($id);
        $invitedProjects = $user->invited()->paginate(12);
    
        return view('pages.profilePageInvitations', [
            'user' => $user,
            'invitedProjects' => $invitedProjects,
        ]);
    }
}
