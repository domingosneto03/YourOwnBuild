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

        } else if (Auth::user()->isAdmin()) {

            // Get all users
            $users = User::where('is_admin', false)->orderBy('username')->paginate(7);

            return view('pages.adminUsers', [
                'users' => $users
            ]);
        }
        
        else {
            // The user is logged in.

            // Get projects for user ordered by id.
            $projects = Auth::user()->projects()->paginate(9);

            // Use the pages.cards template to display all cards.
            return view('pages.homepageProjects', [
                'projects' => $projects
            ]);
        }
    }

    public function showDiscover(Request $request): View
    {
        // Check if the user is logged in.
        if (!Auth::check()) {
            // Not logged in, redirect to login.
            return redirect('/login');
        }
        else {
            $user = Auth::user();
            $projects;

            if ($request->has('query')) {
                $query = $request->input('query');
                $projects = Project::where('name', 'ilike', '%' . $query . '%')
                    ->where('is_public', true)
                    ->orderBy('name', 'asc')
                    ->paginate(6);
                $projects->appends(['query' => $query]);
            } else {
                $projects = Project::orderBy('name', 'asc')
                    ->paginate(6);
            }
            
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
        }
        
        $user = Auth::user();

        if (!$this->authorize('canPerformAction', $user)) {
            Session::flash('warning', 'You are not authorized to create a new project.');
            return redirect()->back();  // Redirect back to the previous page

        }

        return view('pages.homepageNewProject');
    }
}
