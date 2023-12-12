<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Invited extends Model
{
    use HasFactory;

    // Specify the database table to be used
    protected $table = 'invited';

    // Indicates if the model should be timestamped.
    public $timestamps = false;


    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'id_user',
        'id_project',
    ];

    // Get the user who is invited.
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class, 'id_user');
    }

    // Get the project to which the user is invited.
    public function project(): BelongsTo
    {
        return $this->belongsTo(Project::class, 'id_project');
    }
}
