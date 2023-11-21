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

            // Use the pages.project template to display the project.
            return view('pages.project', [
                'project' => $project
            ]);
        }
    }
    public function create()
    {
        return view('pages.createproject');
    }

    public function store(Request $request)
    {
        // Validate the request data
        $validatedData = $request->validate([
            'name' => ['required','max:255'],
            'description' => ['nullable'],
            'is_public' => ['required', 'boolean'],
        ]);

        // Validate creation data
        $validatedData['id_creator'] = auth()->id();
        $validatedData['date_created'] = now()->format('Y-m-d');

        // Debugging statements
        //dd($validatedData); // Check the entire validatedData array

        // Create a new project in the database
        $project = Project::create($validatedData);

        // Redirect the user to the project page after creation
        return redirect('/project/' . $project->id);
    }
}
