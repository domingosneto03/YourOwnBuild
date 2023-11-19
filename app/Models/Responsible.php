<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Responsible extends Model
{
    use HasFactory;

    // Specify the database table to be used
    protected $table = 'responsible';

    // Don't add create and update timestamps in database.
    public $timestamps = false;

    /**
     * The primary key for the model.
     *
     * @var string
     */
    protected $primaryKey = null;

    /**
     * Indicates if the model should be timestamped.
     *
     * @var bool
     */
    public $incrementing = false;

    // Get the user that is responsible for the task.
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class, 'id_user');
    }

    // Get the task for which the user is responsible.
    public function task(): BelongsTo
    {
        return $this->belongsTo(Task::class, 'id_task');
    }
}
