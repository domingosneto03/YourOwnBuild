<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class ProjectNotification extends Model
{
    use HasFactory;

    // Specify the database table to be used
    protected $table = 'project_notification';

    // Don't add create and update timestamps in database.
    public $timestamps = false;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'id_project',
        'notification_type',
    ];

    // Get the project associated with the notification.
    public function project(): BelongsTo
    {
        return $this->belongsTo(Project::class, 'id_project');
    }

    // Get the base notification details.
    public function notification(): BelongsTo
    {
        return $this->belongsTo(Notification::class, 'id');
    }
}
