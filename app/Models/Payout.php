<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\MorphMany;

/**
 * App\Models\Payout
 *
 * @property int $id
 * @property int|null $stage_id
 * @property int|null $recipient_id
 * @property float $amount
 * @property string $currency
 * @property string $method
 * @property string $type
 * @property float $percentage
 * @property string $status
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Comment[] $comments
 * @property-read int|null $comments_count
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\History[] $histories
 * @property-read int|null $histories_count
 * @property-read \App\Models\Stage|null $stage
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Payout newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Payout newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Payout query()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Payout whereAmount($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Payout whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Payout whereCurrency($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Payout whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Payout whereMethod($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Payout wherePercentage($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Payout whereRecipientId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Payout whereStageId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Payout whereStatus($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Payout whereType($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Payout whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class Payout extends Model
{
    protected $fillable = [
        'amount', 'currency', 'method', 'stage_id', 'recipient_id', 'type', 'percentage', 'status'
    ];

    /**
     * @return BelongsTo
     */
    public function stage(): BelongsTo
    {
        return $this->belongsTo(Stage::class);
    }

    /**
     * @return MorphMany
     */
    public function comments(): MorphMany
    {
        return $this->morphMany(Comment::class, 'commentable');
    }

    /**
     * @return MorphMany
     */
    public function histories(): MorphMany
    {
        return $this->morphMany(History::class, 'trackable');
    }
}
