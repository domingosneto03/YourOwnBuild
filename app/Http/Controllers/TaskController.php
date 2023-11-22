<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\View\View;
use Illuminate\Support\Facades\Auth;

use App\Models\Task;
use App\Models\Project;

class TaskController extends Controller
{
    // Display task page
    public function show(string $id) : View
    {
        // Retrieve the task by ID
        $task = Task::findOrFail($id);

        // Return the task view with the task data
        return view('pages.taskpage', ['task' => $task]);
    }

    // Display page to create a task
    public function create(string $id) : View
    {
        // Get the project
        $project = Project::findOrFail($id);
        return view('pages.createtask', ['project' => $project]);
    }

    // Store data in database
    public function store(Request $request)
    {
        // Validate the request data
        $validatedData = $request->validate([
            'name' => ['required','max:255'],
            'label' => ['required', 'max:255'],
            'completion' => ['required'],
            'due_date' => ['required'],
            'priority' => ['required']
        ]);

        // Validate creation data
        $validatedData['id_creator'] = auth()->id();
        $validatedData['id_project'] = $request->input('id_project');
        $validatedData['date_created'] = now()->format('Y-m-d');

        // Debugging statements
        //dd(auth()->id()); 
        dd($validatedData); // Check the entire validatedData array

        // Create a new task in the database
        $task = Task::create($validatedData);

        // Redirect the user to the project page after task creation
        return redirect('/project/' . $task->id_project);
    }
}
