<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Comment;
use App\Models\Task;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class CommentController extends Controller
{
    public function store(Request $request, $taskId)
    {

        $user = Auth::user();

        if (!$this->authorize('canPerformAction', $user)) {
            Session::flash('warning', 'You are not authorized to add comments.');
            return redirect()->back();  // Redirect back to the previous page

        }
        
        // Validate the request data
        $validatedData = $request->validate([
            'content' => ['required', 'max:255'],
        ]);

        // Find the task
        $task = Task::findOrFail($taskId);

        // Create a new comment associated with the task
        $validatedData['id_user'] = auth()->id();
        $validatedData['date'] = now()->format('Y-m-d H:i:s');
        $validatedData['id_task'] = $taskId;
        $comment = Comment::create($validatedData);
        $task->comments()->save($comment);
        // Redirect back or perform other actions as needed
        return redirect()->back()->with('success', 'Comment added successfully.');
    }

    public function destroy($id)
    {
        $comment = Comment::findOrFail($id);
        $comment->delete();
        Session::flash('success', 'Deleted comment with success.');
        return response()->json(['message' => 'Comment deleted successfully']);
    }
}
