<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\View\View;
use Illuminate\Support\Facades\Auth;

use App\Models\Project;
use App\Models\User;

class AdminController extends Controller
{
    public function showUsers(): View
    {
        // Check if the user is logged in.
        if (!Auth::check()) {
            // Not logged in, redirect to login.
            return redirect('/login');
        }

        // Get all users
        $users = User::where('is_admin', false)->orderBy('username')->paginate(7);

        // Add authorization logic if needed.

        return view('pages.adminUsers', [
            'users' => $users,
        ]);
    }

    public function showProjects(): View
    {
        // Check if the user is logged in.
        if (!Auth::check()) {
            // Not logged in, redirect to login.
            return redirect('/login');
        }

        // Get all projects
        $projects = Project::orderBy('name')->paginate(7);

        // Add authorization logic if needed

        return view('pages.adminProjects', [
            'projects' => $projects,
        ]);
    }

    public function blockUser($id)
    {
        //Find user
        $user = User::findOrFail($id);

        // Check if the user exists
        if (!$user) {
            return response()->json(['error' => 'User not found'], 404);
        }

        // Update the is_blocked variable
        $user->is_blocked = 'true';
        $user->save();

        // Return a response
        return response()->json(['message' => 'User successfully blocked']);
    }

    public function unblockUser($id)
    {
        //Find user
        $user = User::findOrFail($id);

        // Check if the user exists
        if (!$user) {
            return response()->json(['error' => 'User not found'], 404);
        }

        // Update the is_blocked variable
        $user->is_blocked = 'false';
        $user->save();

        // Return a response
        return response()->json(['message' => 'User successfully unblocked']);
    }

    public function deleteProject($id) {
        $project = Project::findOrFail($id);

        if (!$project) {
            return response()->json(['error' => 'Project not found'], 404);
        }

        $project->delete();

        return response()->json(['message' => 'Project successfully deleted']);
    }

    // Display project page
    public function showProject(string $id): View
    {   
        // Get the project.
        $project = Project::findOrFail($id);

        // Use the pages.project template to display the project.
        return view('pages.projectTasks', [
            'project' => $project
        ]);
    }

    public function showUser(string $id)
    {   
        $user = User::findOrFail($id);

        // Use the pages.cards template to display all cards.
        return view('pages.profilePageOther', [
            'user' => $user
        ]);
    }
}
