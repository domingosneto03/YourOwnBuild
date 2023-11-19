<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class TaskNotification extends Model
{
    use HasFactory;

    // Specify the database table to be used
    protected $table = 'task_notification';

    // Don't add create and update timestamps in database.
    public $timestamps = false;

    // Get the task associated with the notification.
    public function task(): BelongsTo
    {
        return $this->belongsTo(Task::class, 'id_task');
    }

    // Get the base notification details.
    public function notification(): BelongsTo
    {
        return $this->belongsTo(Notification::class, 'id');
    }
}
