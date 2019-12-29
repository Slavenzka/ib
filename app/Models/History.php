<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\MorphTo;

/**
 * App\Models\History
 *
 * @property int $id
 * @property string $trackable_type
 * @property int $trackable_id
 * @property int $user_id
 * @property string $payload
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Models\History $trackable
 * @property-read \App\Models\User $user
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\History newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\History newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\History query()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\History whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\History whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\History wherePayload($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\History whereTrackableId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\History whereTrackableType($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\History whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\History whereUserId($value)
 * @mixin \Eloquent
 */
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
