<?php

namespace App\Models\Work;

use App\Traits\Slugable;
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
    ];

    protected $appends = [
        'title',
        'description',
        'body',
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
        return $this->translate()->first()->title;
    }

    /**
     * @return mixed
     */
    public function getDescriptionAttribute()
    {
        return $this->translate()->first()->description;
    }

    /**
     * @return mixed
     */
    public function getBodyAttribute()
    {
        return $this->translate()->first()->body;
    }

    /**
     * @return string
     */
    public function getImageMediumAttribute()
    {
        return $this->getFirstMediaUrl('works', 'medium');
    }

    /**
     * @return string
     */
    public function getImageLargeAttribute()
    {
        return $this->getFirstMediaUrl('works', 'large');
    }

    /**
     * Register conversions for images
     */
    public function registerMediaCollections()
    {
        $this
            ->addMediaCollection('works')
            ->registerMediaConversions(function (Media $media) {
                $this
                    ->addMediaConversion('thumb')
                    ->keepOriginalImageFormat()
                    ->fit(Manipulations::FIT_CONTAIN, 200, 200)
                    ->width(200)
                    ->height(200);
                $this
                    ->addMediaConversion('medium')
                    ->keepOriginalImageFormat()
                    ->width(1140)
                    ->height(1140);
            });

        $this
            ->addMediaCollection('gallery')
            ->registerMediaConversions(function (Media $media) {
                $this
                    ->addMediaConversion('thumb')
                    ->keepOriginalImageFormat()
                    ->fit(Manipulations::FIT_CONTAIN, 200, 200)
                    ->width(200)
                    ->height(200);
                $this
                    ->addMediaConversion('large')
                    ->keepOriginalImageFormat()
                    ->width(1980)
                    ->height(1980);
            });
    }
}
