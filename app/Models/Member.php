<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Member extends Model
{
    use HasFactory;

    // Specify the database table to be used
    protected $table = 'member';

    // Don't add create and update timestamps in database.
    public $timestamps = false;

    // Get the user that is a member of the project.
    public function user()
    {
        return $this->belongsTo(User::class, 'id_user');
    }

    // Get the project that the user is a member of.
    public function project()
    {
        return $this->belongsTo(Project::class, 'id_project');
    }
}
