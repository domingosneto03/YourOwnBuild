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
        'name',
        'description',
        'is_public',
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
}
