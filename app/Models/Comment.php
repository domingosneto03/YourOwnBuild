<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    use HasFactory;

    // Specify the database table to be used
    protected $table = 'comment';

    // Don't add create and update timestamps in database.
    public $timestamps = false;

    protected $fillable = [
        'id_user',
        'id_task',
        'content',
        'date'
    ];

    protected $casts = [
        'date' => 'datetime',
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'id_user');
    }

    public function task()
    {
        return $this->belongsTo(Task::class, 'id_task');
    }
}
