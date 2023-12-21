<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\View\View;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

use App\Models\Task;
use App\Models\Project;
use App\Models\Responsible;
use App\Models\User;

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

    // Store data in database
    public function store(Request $request)
    {
        // Validate the request data
        $validatedData = $request->validate([
            'name' => ['required','max:255'],
            'label' => ['required', 'max:255'],
            'due_date' => ['required'],
            'priority' => ['required'],
            'assigned' => ['array']
        ]);

        // Validate creation data
        $validatedData['id_creator'] = auth()->id();
        $validatedData['id_project'] = $request->input('id_project');
        $validatedData['date_created'] = now()->format('Y-m-d');
        $validatedData['completion'] = 'pending';

        // Debugging statements
        //dd(auth()->id()); 
        //dd($validatedData); // Check the entire validatedData array

        if (strtotime($validatedData['due_date']) <= strtotime($validatedData['date_created'])) {
            Session::flash('error', 'The deadline must be after the present day.');
            return redirect()->back();
        }

        if (empty($validatedData['assigned'])) {
            Session::flash('error', 'Please assign the task to at least one user.');
            return redirect()->back();
        }

        // Create a new task in the database
        $task = Task::create($validatedData);

        foreach ($request->input('assigned') as $userId) {
            $task->responsibleUsers()->attach($userId);
        }

        Session::flash('success', 'Created task with success.');
        // Redirect the user to the project page after task creation
        return redirect('/project/' . $task->id_project . '/tasks/');
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

        if (strtotime($validatedData['due_date']) <= strtotime($task->date_created)) {
            Session::flash('error', 'The deadline must be after the present day.');
            return redirect()->back();
        }
        $task->update($validatedData);
        
        Session::flash('success', 'Updated task details with success.');
        return redirect('/project/' . $task->id_project . '/tasks/');
    }

    public function updateAssign(Request $request, $id)
    {
        $validatedData = $request->validate([
            'assigned' => ['array'],
        ]);

        if (empty($validatedData['assigned'])) {
            Session::flash('error', 'Please assign the task to at least one user.');
            return redirect()->back();
        }

        $task = Task::findOrFail($id);
        $task->responsibleUsers()->detach();

        foreach ($request->input('assigned') as $userId) {
            $task->responsibleUsers()->attach($userId);
        }
        $task->update($validatedData);

        Session::flash('success', 'Assigned users with success.');
        return redirect('/project/' . $task->id_project . '/tasks/');
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
        $task->delete();

        Session::flash('success', 'Deleted task with success.');
        return redirect('/project/' . $task->id_project . '/tasks/');
    }

}
