<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\View\View;
use Illuminate\Support\Facades\Auth;

use App\Models\Project;
use App\Models\User;

class ProjectController extends Controller
{
    // Display project page
    public function showTasks(string $id): View
    {   
        // Check if the user is logged in.
        if (!Auth::check()) {
            // Not logged in, redirect to login.
            return redirect('/login');

        } else {
            // Get the project.
            $project = Project::findOrFail($id);

            // Use the pages.project template to display the project.
            return view('pages.projectTasks', [
                'project' => $project
            ]);
        }
    }
    
    public function showNewTask($id): View
    {   
        // Check if the user is logged in.
        if (!Auth::check()) {
            // Not logged in, redirect to login.
            return redirect('/login');

        } else {
            $project = Project::findOrFail($id);
            //$projects = Auth::user()->projects()->get();

            return view('pages.projectNewTask', [
                'project' => $project
            ]);
        }
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
        return redirect('/project/' . $project->id . '/tasks');
    }

    // Display edit project view for the coordinator
    public function showEdit(string $id): View
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
        return view('pages.projectEdit', [
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
        return redirect('/project/' . $project->id . '/tasks');
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
        return redirect('/homepage/projects/');
    }

    // Display team page
    public function showTeam(string $id): View
    {
        // Check if the user is logged in.
        if (!Auth::check()) {
            // Not logged in, redirect to login.
            return redirect('/login');
        }

        // Get the project.
        $project = Project::findOrFail($id);
        $teamMembers = $project->members()->paginate(6);



        return view('pages.projectTeam', [
            'project' => $project,
            'teamMembers' => $teamMembers,
        ]);
    }

    // Display team page
    public function showRequests(string $id): View
    {
    
        // Get the project.
        $project = Project::findOrFail($id);
        $joinRequests = $project->joinRequests()->paginate(12);

        return view('pages.projectRequests', [
            'project' => $project,
            'joinRequests' => $joinRequests,
        ]);
    }

}
