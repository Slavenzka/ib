<?php

namespace App\Models\Work;

use App\Traits\Sluggable;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasOneOrMany;
use Spatie\Image\Manipulations;
use Spatie\MediaLibrary\HasMedia\HasMedia;
use Spatie\MediaLibrary\HasMedia\HasMediaTrait;
use Spatie\MediaLibrary\Models\Media;
use Spatie\Sluggable\SlugOptions;
use Spatie\Translatable\HasTranslations;

/**
 * Class Work
 *
 * @package App\Models\Work
 * @property int $id
 * @property string $slug
 * @property array $title
 * @property array $body
 * @property array|null $description
 * @property int $type_id
 * @property bool $in_slideshow
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read string $image_medium
 * @property-read mixed $translations
 * @property-read \Illuminate\Database\Eloquent\Collection|\Spatie\MediaLibrary\Models\Media[] $media
 * @property-read int|null $media_count
 * @property-read \App\Models\Work\WorkType $type
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Work\Work newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Work\Work newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Work\Work query()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Work\Work whereBody($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Work\Work whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Work\Work whereDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Work\Work whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Work\Work whereInSlideshow($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Work\Work whereSlug($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Work\Work whereTitle($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Work\Work whereTypeId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Work\Work whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class Work extends Model implements HasMedia
{
    use Sluggable, HasMediaTrait, HasTranslations;

    protected $fillable = [
        'slug',
        'title',
        'body',
        'description',
        'type_id',
        'in_slideshow'
    ];

    protected $with = [
        'type',
    ];

    protected $translatable = [
        'title',
        'body',
        'description'
    ];

    /**
     * @return BelongsTo
     */
    public function type(): BelongsTo
    {
        return $this->belongsTo(WorkType::class);
    }

    /**
     * @return string
     */
    public function getPreviewAttribute()
    {
        return optional($this->getFirstMedia('preview'))->getFullUrl('medium');
    }

    public function scopeInSlideshow()
    {
        return $this->where('in_slideshow', 1);
    }

    /**
     * Register conversions for images
     */
    public function registerMediaCollections()
    {
        $this
            ->addMediaCollection('preview')
            ->registerMediaConversions(function (Media $media) {
                $this
                    ->addMediaConversion('small')
                    ->keepOriginalImageFormat()
                    ->width(620)
                    ->height(620)
                    ->nonOptimized();
                $this
                    ->addMediaConversion('medium')
                    ->keepOriginalImageFormat()
                    ->width(1140)
                    ->height(1140)
                    ->nonOptimized();
            });

        $this
            ->addMediaCollection('work')
            ->registerMediaConversions(function (Media $media) {
                $this
                    ->addMediaConversion('large')
                    ->keepOriginalImageFormat()
                    ->width(1980)
                    ->height(1980)
                    ->nonOptimized();
            });
    }

    /**
     * Boot
     */
    protected static function boot()
    {
        parent::boot();

        static::addGlobalScope('ordered', function (Builder $builder) {
            $builder->latest();
        });
    }
}
