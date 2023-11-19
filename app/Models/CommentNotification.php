<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class CommentNotification extends Model
{
    use HasFactory;

    // Specify the database table to be used
    protected $table = 'comment_notification';

    // Don't add create and update timestamps in database.
    public $timestamps = false;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'id_comment',
        'notification_type',
    ];

    // Get the comment associated with the notification.
    public function comment(): BelongsTo
    {
        return $this->belongsTo(Comment::class, 'id_comment');
    }

    // Get the base notification details.
    public function notification(): BelongsTo
    {
        return $this->belongsTo(Notification::class, 'id');
    }
}
