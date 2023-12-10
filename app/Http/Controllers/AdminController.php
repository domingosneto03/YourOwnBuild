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

        // Add authorization logic if needed.

        return view('pages.adminpage');
    }

    public function showUsers(): View
    {
        // Check if the user is logged in.
        if (!Auth::check()) {
            // Not logged in, redirect to login.
            return redirect('/login');
        }

        // Get all projects
        $users = User::all();

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
        $projects = Project::all();

        // Add authorization logic if needed

        return view('partials.adminProjects', [
            'projects' => $projects,
        ]);
    }
}
