<div class="row justify-content-evenly flex-grow-1">
    @php 
        $tasks = $project->tasks()->get();
        $pendingTasks = $tasks->where('completion', 'pending');
        $inProgressTasks = $tasks->where('completion', 'in_progress');
        $completedTasks = $tasks->where('completion', 'completed');
    @endphp
    <div id="col-pending" class="col bg-primary-subtle mx-3">
      <h2 class="text-center mt-3">Pending</h2>
      @foreach ($pendingTasks as $task)
        @include('partials.task', ['task' => $task])
      @endforeach
    </div>
    <div id="col-in_progress" class="col bg-primary-subtle mx-3">
      <h2 class="text-center mt-3">In Progress</h2>
      @foreach ($inProgressTasks as $task)
        @include('partials.task', ['task' => $task])
      @endforeach
    </div>
    <div id="col-completed" class="col bg-primary-subtle mx-3">
      <h2 class="text-center mt-3">Completed</h2>
      @foreach ($completedTasks as $task)
        @include('partials.task', ['task' => $task])
      @endforeach
    </div>  
</div>