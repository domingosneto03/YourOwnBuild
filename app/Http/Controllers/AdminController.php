<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\View\View;
use Illuminate\Support\Facades\Auth;

use App\Models\Project;
use App\Models\User;

class AdminController extends Controller
{
    public function show(): View
    {
        // Check if the user is logged in.
        if (!Auth::check()) {
            // Not logged in, redirect to login.
            return redirect('/login');
        }

        $users = User::all()->where('is_admin', false)->sortBy('username');
        $projects = Project::all()->sortBy('name');

        // Add authorization logic if needed.

        return view('pages.adminpage', [
            'users' => $users,
            'projects' => $projects,
        ]);
    }

    public function showUsers(): View
    {
        // Check if the user is logged in.
        if (!Auth::check()) {
            // Not logged in, redirect to login.
            return redirect('/login');
        }

        // Get all users
        $users = User::all()->where('is_admin', false)->sortBy('username');

        // Add authorization logic if needed.

        return view('partials.adminUsers', [
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
        $projects = Project::all()->sortBy('name');

        // Add authorization logic if needed

        return view('partials.adminProjects', [
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
}
