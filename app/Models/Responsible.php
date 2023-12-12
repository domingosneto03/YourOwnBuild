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

    // Indicates if the model should be timestamped.
    public $timestamps = false;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'id_user',
        'id_task',
    ];

    /**
     * Get the user associated with the responsibility.
     */
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class, 'id_user');
    }

    /**
     * Get the task associated with the responsibility.
     */
    public function task(): BelongsTo
    {
        return $this->belongsTo(Task::class, 'id_task');
    }
}
