<?php

namespace App\Traits;

trait Slugable
{
    /**
     * Set key for model
     * @return string
     */
    public function getRouteKeyName(): string
    {
        return 'slug';
    }

    /**
     * Set the proper slug attribute.
     *
     * @param string $value
     */
    public function setSlugAttribute($value)
    {
        if (static::whereSlug($slug = str_slug($value))->exists()
            && static::whereSlug(str_slug($value))->count() > 1) {
            $slug = $this->incrementSlug($slug);
        }
        $this->attributes['slug'] = $slug;
    }

    /**
     * Increment a slug's suffix.
     *
     * @param  string $slug
     * @return string
     */
    protected function incrementSlug($slug)
    {
        $id = static::latest('id')->value('id');
        return "{$slug}-{$id}";
    }
}
