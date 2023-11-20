<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

// Added to define Eloquent relationships.
use Illuminate\Database\Eloquent\Relations\HasMany;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;
    
    // Specify the database table to be used
    protected $table = 'users2';

    // Don't add create and update timestamps in database.
    public $timestamps  = false;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'username',
        'name',
        'email',
        'password',
        'bio',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
        'password' => 'hashed',
    ];

    // Get the projects created by the user.
    public function projectsCreated(): HasMany
    {
        return $this->hasMany(Project::class, 'id_creator');
    }

    // Get the tasks created by the user.
    public function tasksCreated(): HasMany
    {
        return $this->hasMany(Task::class, 'id_creator');
    }

    // Get the comments made by the user.
    public function comments(): HasMany
    {
        return $this->hasMany(Comment::class, 'id_user');
    }

    // Get the project memberships of the user.
    public function projectMemberships(): HasMany
    {
        return $this->hasMany(Member::class, 'id_user');
    }

    // Get the notifications for the user.
    public function notifications(): HasMany
    {
        return $this->hasMany(Notification::class, 'id_user');
    }

    // Get the tasks the user is responsible for.
    public function responsibleTasks(): HasMany
    {
        return $this->hasMany(Task::class, 'id_user', 'id');
    }

    public function projects()
    {
        return $this->belongsToMany(Project::class, 'member', 'id_user', 'id_project')
                    ->withPivot('role');
    }
}
