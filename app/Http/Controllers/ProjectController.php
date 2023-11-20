<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\View\View;
use Illuminate\Support\Facades\Auth;

use App\Models\Project;

class ProjectController extends Controller
{
    // Display homepage
    public function show(string $id): View
    {   
        // Check if the user is logged in.
        if (!Auth::check()) {
            // Not logged in, redirect to login.
            return redirect('/login');

        } else {
            // Get the card.
            $project = Project::findOrFail($id);

            // Check if the current user can see (show) the card.
            // $this->authorize('show', $card);  

            // Use the pages.card template to display the card.
            return view('pages.project', [
                'project' => $project
            ]);
        }
    }
}
