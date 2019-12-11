<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\MorphTo;

class History extends Model
{
    protected $fillable = [
        'tracked_type', 'tracked_id', 'user_id', 'payload'
    ];

    /**
     * @return MorphTo
     */
    public function trackable(): MorphTo
    {
        return $this->morphTo()->with('user');
    }

    /**
     * @return BelongsTo
     */
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}
