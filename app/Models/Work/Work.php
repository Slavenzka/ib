<?php

namespace App\Models\Work;

use App\Traits\Slugable;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasOneOrMany;
use Spatie\Image\Manipulations;
use Spatie\MediaLibrary\HasMedia\HasMedia;
use Spatie\MediaLibrary\HasMedia\HasMediaTrait;
use Spatie\MediaLibrary\Models\Media;

class Work extends Model implements HasMedia
{
    use Slugable;
    use HasMediaTrait;

    protected $fillable = [
        'slug',
        'type_id',
        'in_slideshow'
    ];

    protected $casts = [
        'in_slideshow' => 'boolean'
    ];

    protected $appends = [
        'title',
        'description',
        'body',
        'image_medium',
    ];

    protected $with = [
        'type',
    ];

    /**
     * @return BelongsTo
     */
    public function type(): BelongsTo
    {
        return $this->belongsTo(WorkType::class);
    }

    /**
     * @param null $lang
     * @return HasOneOrMany
     */
    public function translate($lang = null): HasOneOrMany
    {
        if (!$lang) {
            $lang = app()->getLocale();
        }
        return $this->hasOne(WorkTranslate::class)
                    ->where('lang', $lang);
    }

    /**
     * @return mixed
     */
    public function getTitleAttribute()
    {
        return $this->translate()->value('title');
    }

    /**
     * @return mixed
     */
    public function getDescriptionAttribute()
    {
        return $this->translate()->value('description');
    }

    /**
     * @return mixed
     */
    public function getBodyAttribute()
    {
        return $this->translate()->value('body');
    }

    /**
     * @return string
     */
    public function getImageMediumAttribute()
    {
        return asset($this->getFirstMediaUrl('preview', 'medium'));
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
                    ->addMediaConversion('medium')
                    ->keepOriginalImageFormat()
                    ->width(1140)
                    ->height(1140)
                    ->sharpen(20)
                    ->nonOptimized();;
            });

        $this
            ->addMediaCollection('work')
            ->registerMediaConversions(function (Media $media) {
                $this
                    ->addMediaConversion('large')
                    ->keepOriginalImageFormat()
                    ->width(1980)
                    ->height(1980)
                    ->sharpen(10)
                    ->nonOptimized();
            });
    }

    /**
     * Boot
     */
    protected static function boot()
    {
        parent::boot();

        static::addGlobalScope('order', function (Builder $builder) {
            $builder->latest();
        });
    }
}
