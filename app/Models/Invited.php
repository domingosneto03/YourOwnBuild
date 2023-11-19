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

    // Don't add create and update timestamps in database.
    public $timestamps = false;

    /**
     * The primary key for the model.
     *
     * @var string
     */
    protected $primaryKey = null;

    /**
     * Indicates if the IDs are auto-incrementing.
     *
     * @var bool
     */
    public $incrementing = false;


    // Get the user associated with the invitation.
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class, 'id_user');
    }

    // Get the project associated with the invitation.
    public function project(): BelongsTo
    {
        return $this->belongsTo(Project::class, 'id_project');
    }
}
