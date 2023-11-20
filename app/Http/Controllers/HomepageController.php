<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\View\View;
use Illuminate\Support\Facades\Auth;

use App\Models\User;

class HomepageController extends Controller
{
    // Display homepage
    public function show(): View
    {   
        // Check if the user is logged in.
        if (!Auth::check()) {
            // Not logged in, redirect to login.
            return redirect('/login');

        } else {
            // The user is logged in.

            // Get projects for user ordered by id.
            $projects = Auth::user()->projects()->get();

            // Check if the current user can list the projects.
            // $this->authorize('list', Project::class);

            // The current user is authorized to list cards.

            // Use the pages.cards template to display all cards.
            return view('pages.homepage', [
                'projects' => $projects
            ]);
        }
    }
}
