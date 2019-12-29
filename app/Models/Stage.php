<?php

namespace App\Models;

use Eloquent;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\MorphMany;
use Illuminate\Database\Eloquent\Relations\MorphToMany;
use Illuminate\Support\Carbon;
use Spatie\EloquentSortable\Sortable;
use Spatie\EloquentSortable\SortableTrait;
use Spatie\MediaLibrary\HasMedia\HasMedia;
use Spatie\MediaLibrary\HasMedia\HasMediaTrait;
use Spatie\MediaLibrary\Models\Media;

/**
 * App\Models\Stage
 *
 * @property int $id
 * @property int $project_id
 * @property string $title
 * @property string|null $description
 * @property float $est_price
 * @property string $est_currency
 * @property string $status
 * @property Carbon|null $starts_at
 * @property Carbon|null $ends_at
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * @property-read Collection|Comment[] $comments
 * @property-read int|null $comments_count
 * @property-read Collection|Media[] $media
 * @property-read int|null $media_count
 * @property-read Project $project
 * @property-read Collection|Tag[] $tags
 * @property-read int|null $tags_count
 * @method static Builder|Stage newModelQuery()
 * @method static Builder|Stage newQuery()
 * @method static Builder|Stage query()
 * @method static Builder|Stage whereCreatedAt($value)
 * @method static Builder|Stage whereDescription($value)
 * @method static Builder|Stage whereEndsAt($value)
 * @method static Builder|Stage whereEstCurrency($value)
 * @method static Builder|Stage whereEstPrice($value)
 * @method static Builder|Stage whereId($value)
 * @method static Builder|Stage whereProjectId($value)
 * @method static Builder|Stage whereStartsAt($value)
 * @method static Builder|Stage whereStatus($value)
 * @method static Builder|Stage whereTitle($value)
 * @method static Builder|Stage whereUpdatedAt($value)
 * @mixin Eloquent
 */
class Stage extends Model implements HasMedia, Sortable
{
    use HasMediaTrait, SortableTrait;

    protected $fillable = [
        'title', 'description', 'status', 'starts_at', 'ends_at', 'est_price', 'est_currency', 'project_id'
    ];

    protected $dates = [
        'starts_at', 'ends_at'
    ];

    protected $withCount = ['comments'];

    /**
     * @return BelongsTo
     */
    public function project(): BelongsTo
    {
        return $this->belongsTo(Project::class);
    }

    /**
     * @return MorphMany
     */
    public function comments(): MorphMany
    {
        return $this->morphMany(Comment::class, 'commentable');
    }

    /**
     * @return MorphToMany
     */
    public function tags(): MorphToMany
    {
        return $this->morphToMany(Tag::class, 'taggable');
    }

    /* Accessors */

    public function getDatesRangeAttribute()
    {
        if (!$this->starts_at && !$this->ends_at) {
            return '';
        }

        $dates = [];
        $dates[] = optional($this->starts_at)->format('d.m.Y H:i') ?? '…';
        $dates[] = optional($this->ends_at)->format('d.m.Y H:i') ?? '…';

        return implode(' – ', $dates);
    }

    public function getPriceAttribute()
    {
        if (!$this->est_price) {
            return '';
        }

        return in_array($this->est_currency, ['USD', 'EUR'])
            ? trans('crm.currencies.'.$this->est_currency) . $this->est_price
            : $this->est_price . ' ' . trans('crm.currencies.' . $this->est_currency);
    }

    /**
     * BOOT
     */
    protected static function boot()
    {
        parent::boot();

        // @TODO order by status
    }
}
