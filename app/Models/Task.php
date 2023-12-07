<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    use HasFactory;

    // Specify the database table to be used
    protected $table = 'task';

    // Don't add create and update timestamps in database.
    public $timestamps  = false;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'id_creator',
        'id_project',
        'name',
        'label',
        'date_created',
        'due_date',
        'priority',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'date_created' => 'datetime',
        'due_date' => 'datetime',
    ];

    /**
     * The default values for attributes.
     *
     * @var array<string, mixed>
     */
    protected $attributes = [
        'completion' => 'pending',
    ];

    // Get the creator of the task.
    public function creator()
    {
        return $this->belongsTo(User::class, 'id_creator');
    }

    // Get the project associated with the task.
    public function project()
    {
        return $this->belongsTo(Project::class, 'id_project');
    }

    // Get the comments for the task.
    public function comments()
    {
        return $this->hasMany(Comment::class, 'id_task');
    }

    // Get the notifications related to the task.
    public function notifications()
    {
        return $this->hasMany(TaskNotification::class, 'id_task');
    }

    // Get the users responsible for the task.
    public function responsibleUsers()
    {
        return $this->belongsToMany(User::class, 'responsible', 'id_task', 'id_user');
    }

    // Listen for the 'deleting' event and remove associated columns
    protected static function boot()
    {
        parent::boot();

        static::deleting(function ($task) {
            $task->comments()->delete(); // Remove the associated tasks from the table
            $task->responsibleUsers()->detach(); // Remove the associated users from the pivot table
            $task->notifications()->delete(); // Remove the associated project notifications from the table
        });
    }

}
