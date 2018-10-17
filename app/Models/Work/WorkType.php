<?php

namespace App\Models\Work;

use App\Traits\Slugable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOneOrMany;

class WorkType extends Model
{
    use Slugable;

    protected $fillable = [
        'slug',
    ];

    protected $appends = [
        'title'
    ];

    public function work(): HasMany
    {
        return $this->hasMany(Work::class);
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
        return $this->hasOne(WorkTypeTranslate::class, 'type_id')
                    ->where('lang', $lang);
    }

    /**
     * @return mixed
     */
    public function getTitleAttribute()
    {
        return $this->translate()->first()->title;
    }
}
