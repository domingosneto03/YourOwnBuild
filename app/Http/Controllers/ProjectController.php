<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\View\View;
use Illuminate\Support\Facades\Auth;

use App\Models\Project;

class ProjectController extends Controller
{
    // Display project page
    public function show(string $id): View
    {   
        // Check if the user is logged in.
        if (!Auth::check()) {
            // Not logged in, redirect to login.
            return redirect('/login');

        } else {
            // Get the project.
            $project = Project::findOrFail($id);

            // Use the pages.project template to display the project.
            return view('pages.project', [
                'project' => $project
            ]);
        }
    }

    // Display homepage
    public function showHomepage(): View
    {   
        // Check if the user is logged in.
        if (!Auth::check()) {
            // Not logged in, redirect to login.
            return redirect('/login');

        } else {
            $projects = Auth::user()->projects()->get();

            return view('partials.homepageMainContent', [
                'projects' => $projects
            ]);
        }
    }
    
    // Display page to create a project
    public function create()
    {   
        // Check if the user is logged in.
        if (!Auth::check()) {
            // Not logged in, redirect to login.
            return redirect('/login');
        }

        // Check if the current user can edit the project.
        // Add authorization logic if needed.

        return view('partials.createproject');
    }

    // Store data in database
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

    // Display edit project view for the coordinator
    public function edit(string $id): View
    {
        // Check if the user is logged in.
        if (!Auth::check()) {
            // Not logged in, redirect to login.
            return redirect('/login');
        }

        // Get the project.
        $project = Project::findOrFail($id);

        // Check if the current user can edit the project.
        // Add authorization logic if needed.

        // Use the pages.editproject template to display the edit form.
        return view('partials.editproject', [
            'project' => $project,
        ]);
    }

    public function tasks(string $id): View
    {
        // Check if the user is logged in.
        if (!Auth::check()) {
            // Not logged in, redirect to login.
            return redirect('/login');
        }

        // Get the project.
        $project = Project::findOrFail($id);

        // Check if the current user can edit the project.
        // Add authorization logic if needed.

        // Use the pages.editproject template to display the edit form.
        return view('partials.projectTasks', [
            'project' => $project,
        ]);
    }

    // Update values in database
    public function update(Request $request, $id)
    {
        // Validate the request data
        $validatedData = $request->validate([
            'name' => ['required', 'max:255'],
            'description' => ['nullable'],
            'is_public' => ['required', 'boolean'],
        ]);

        // Get the project
        $project = Project::findOrFail($id);

        // Check if the current user can update the project.
        // Add authorization logic if needed.

        // Update the project with the new data
        $project->update($validatedData);

        // Redirect the user to the project page after update
        return redirect('/project/' . $project->id);
    }

    // Delete a project, option avalible only to the coordinator
    public function destroy($id)
    {
    // Retrieve the project by ID
    $project = Project::findOrFail($id);

    // Add authorization check if needed

    // Delete the project
    $project->delete();

    // Redirect to the projects list or another appropriate page
    return redirect('/homepage')->with('success', 'Project deleted successfully');
    }

}
