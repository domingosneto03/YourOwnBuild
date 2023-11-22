<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    use HasFactory;

    // Specify the database table to be used
    protected $table = 'project1';

    // Don't add create and update timestamps in database.
    public $timestamps  = false;

    protected $fillable = [
        'id_creator',
        'name',
        'description',
        'is_public',
        'date_created',
    ];

    protected $casts = [
        'date_created' => 'datetime',
    ];

    // Get the creator of the project.
    public function creator()
    {
        return $this->belongsTo(User::class, 'id_creator');
    }

    // Get the tasks associated with the project.
    public function tasks()
    {
        return $this->hasMany(Task::class, 'id_project');
    }

    public function members()
    {
        return $this->belongsToMany(User::class, 'member', 'id_project', 'id_user')
                    ->withPivot('role');
    }

    // Get the notifications of a project
    public function notifications()
    {
        return $this->hasMany(ProjectNotification::class, 'id_project');
    }

    // Get the users invited to the project.
    public function invited()
    {
        return $this->belongsToMany(User::class, 'invited', 'id_project', 'id_user');
    }

    // Get the users who requested to join the project.
    public function joinRequests()
    {
        return $this->belongsToMany(User::class, 'request_join', 'id_project', 'id_user');
    }

    // Listen for the 'deleting' event and remove associated columns
    protected static function boot()
    {
        parent::boot();

        static::deleting(function ($project) {
            $project->tasks()->delete(); // Remove the associated tasks from the table
            $project->members()->detach(); // Remove the associated members (users) from the pivot table
            $project->notifications()->delete(); // Remove the associated project notifications from the table
            $project->invited()->detach(); // Remove the associated invitations from the table
            $project->joinRequests()->detach(); // Remove the associated join requests from the table
        });
    }
}
