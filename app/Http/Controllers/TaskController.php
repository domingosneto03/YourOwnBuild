<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\View\View;
use Illuminate\Support\Facades\Auth;

use App\Models\Task;

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
    public function create()
    {
        return view('pages.createtask');
    }

    // Store data in database
    public function store(Request $request)
    {
        // Validate the request data
        $validatedData = $request->validate([
            'name' => ['required','max:255'],
            'label' => ['required', 'max:255'],
            'completion' => ['required'],
            'due_date' => ['required','date'],
            'prioriy' => ['required']
        ]);

        // Validate creation data
        $validatedData['id_creator'] = auth()->id();
        $validatedData['id_project'] = $project->id;
        $validatedData['date_created'] = now()->format('Y-m-d');

        // Debugging statements
        //dd($validatedData); // Check the entire validatedData array

        // Create a new task in the database
        $task = Task::create($validatedData);

        // Redirect the user to the project page after task creation
        return redirect('/project/' . $project->id);
    }
}
