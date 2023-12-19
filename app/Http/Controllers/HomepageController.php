<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\View\View;
use Illuminate\Support\Facades\Auth;

use App\Models\User;
use App\Models\Project;

class HomepageController extends Controller
{
    // Display homepage
    public function showProjects(): View
    {   
        // Check if the user is logged in.
        if (!Auth::check()) {
            // Not logged in, redirect to login.
            return redirect('/login');

        } else {
            // The user is logged in.

            // Get projects for user ordered by id.
            $projects = Auth::user()->projects()->paginate(9);

            // Check if the current user can list the projects.
            // $this->authorize('list', Project::class);

            // The current user is authorized to list cards.

            // Use the pages.cards template to display all cards.
            return view('pages.homepageProjects', [
                'projects' => $projects
            ]);
        }
    }

    public function showDiscover(): View
    {
        // Check if the user is logged in.
        if (!Auth::check()) {
            // Not logged in, redirect to login.
            return redirect('/login');
        }
        else {
            $user = Auth::user();
            $projects = Project::paginate(9);
            
            // Use the partials.team template to display the team.
            return view('pages.homepageDiscover', [
                'user' => $user,
                'projects' => $projects,
            ]);
        }
    }

    public function showNewProject(): View
    {   
        // Check if the user is logged in.
        if (!Auth::check()) {
            // Not logged in, redirect to login.
            return redirect('/login');

        } else {
            // The user is logged in.

            // Check if the current user can list the projects.
            // $this->authorize('list', Project::class);

            // The current user is authorized to list cards.

            // Use the pages.cards template to display all cards.
            return view('pages.homepageNewProject');
        }
    }
}
