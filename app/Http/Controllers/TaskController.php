<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\View\View;
use Illuminate\Support\Facades\Auth;

use App\Models\Task;

class TaskController extends Controller
{
    // Display task page
    public function show($id)
    {
        // Retrieve the task by ID
        $task = Task::findOrFail($id);

        // Return the task view with the task data
        return view('pages.taskpage', ['task' => $task]);
    }
}
