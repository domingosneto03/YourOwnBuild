<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class AdminAction extends Model
{
    use HasFactory;

    // Specify the database table to be used
    protected $table = 'admin_action';

    // Don't add create and update timestamps in database.
    public $timestamps = false;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'is_blocking',
        'justification',
    ];

    // Get the admin who performed the action.
    public function admin(): BelongsTo
    {
        return $this->belongsTo(User::class, 'id_admin');
    }

    // Get the user who is the subject of the action.
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class, 'id_user');
    }
}
