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
        return view('partials.createtask', ['project' => $project]);
    }

    // Store data in database
    public function store(Request $request)
    {
        // Validate the request data
        $validatedData = $request->validate([
            'name' => ['required','max:255'],
            'label' => ['required', 'max:255'],
            'due_date' => ['required'],
            'priority' => ['required']
        ]);

        // Validate creation data
        $validatedData['id_creator'] = auth()->id();
        $validatedData['id_project'] = $request->input('id_project');
        $validatedData['date_created'] = now()->format('Y-m-d');
        $validatedData['completion'] = 'pending';

        // Debugging statements
        //dd(auth()->id()); 
        //dd($validatedData); // Check the entire validatedData array

        // Create a new task in the database
        $task = Task::create($validatedData);

        // Redirect the user to the project page after task creation
        return redirect('/project/' . $task->id_project);
    }

    // Display edit task view for the creator, coordinator or responsible
    public function edit(string $id): View
    {
        $task = Task::findOrFail($id);
        $project = Project::findOrFail($task->id_project);
        return view('pages.edittask', ['task' => $task, 'project' => $project]);
    }

    // Update values in database
    public function update(Request $request, $id)
    {
        $validatedData = $request->validate([
            'name' => ['required', 'max:255'],
            'label' => ['required', 'max:255'],
            'completion' => ['required'],
            'due_date' => ['required', 'date'],
            'priority' => ['required'],
        ]);

        $task = Task::findOrFail($id);
        $task->update($validatedData);

        // Redirect the user to the project page after task edition
        return redirect('/project/' . $task->id_project);
    }

    public function updateCompletion(Request $request, $id)
    {
        $request->validate([
            'completion' => 'required|in:pending,in_progress,completed', // Add any other validation rules as needed
        ]);

        // Find the task by ID
        $task = Task::find($id);

        // Check if the task exists
        if (!$task) {
            return response()->json(['error' => 'Task not found'], 404);
        }

        // Update the completion variable
        $task->completion = $request->input('completion');
        $task->save();

        // Return a response
        return response()->json(['message' => 'Task completion updated successfully', 'task' => $task]);
    }

    // Delete a task, option only avalible to coordinator
    public function destroy($id)
    {
        $task = Task::findOrFail($id);
        $projectId = $task->id_project;
        $task->delete();

        return redirect('/project/' . $projectId)->with('success', 'Task deleted successfully.');
    }

}
