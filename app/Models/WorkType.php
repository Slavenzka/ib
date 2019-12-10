<?php

namespace App\Models;

use App\Traits\Sluggable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOneOrMany;
use Spatie\Translatable\HasTranslations;

/**
 * App\Models\WorkType
 *
 * @property int $id
 * @property string $slug
 * @property array $title
 * @property mixed|null $description
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read mixed $translations
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Work[] $work
 * @property-read int|null $work_count
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\WorkType newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\WorkType newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\WorkType query()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\WorkType whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\WorkType whereDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\WorkType whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\WorkType whereSlug($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\WorkType whereTitle($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\WorkType whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class WorkType extends Model
{
    use Sluggable, HasTranslations;

    protected $fillable = [
        'slug',
        'title'
    ];

    protected $translatable = [
        'title',
    ];

    /**
     * @return HasMany
     */
    public function work(): HasMany
    {
        return $this->hasMany(Work::class);
    }
}
