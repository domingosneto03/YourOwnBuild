<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class RequestJoin extends Model
{
    use HasFactory;

    // Specify the database table to be used
    protected $table = 'request_join';

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

    // Get the user making the join request.
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class, 'id_user');
    }

    // Get the project associated with the join request.
    public function project(): BelongsTo
    {
        return $this->belongsTo(Project::class, 'id_project');
    }
}
