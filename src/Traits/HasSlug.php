<?php

namespace Marketplaceful\Traits;

use Illuminate\Support\Str;

trait HasSlug
{
    /**
     * Boot the current trait.
     *
     * @return void
     */
    protected static function bootHasSlug()
    {
        static::saving(function ($model) {
            // Set the slug if the model has not set it previously or the base been changed.
            if (! $model->getAttributeValue($model->getSlugKey()) || $model->isDirty($model->sluggableAttribute())) {
                $model->setSlug();
            }
        });
    }

    /**
     * Sets the URL slug from a given string.
     *
     * @return void
     */
    public function setSlug()
    {
        $value = $this->getAttribute($this->sluggableAttribute());

        $this->setAttribute($this->getSlugKey(), $this->slugValue($value));
    }

    /**
     * Transforms a given string to a slugged string.
     *
     * @param  string  $value
     * @return string
     */
    protected function slugValue(string $value)
    {
        $originalSlug = Str::slug($value);
        $slug = $originalSlug;
        $i = 1;

        while (static::where($this->getSlugKey(), '=', $slug)->exists()) {
            $slug = $originalSlug . '-' . $i;
            $i++;
        }

        return $slug;
    }

    /**
     * Returns the attribute key that holds the string to slug.
     *
     * @return string
     */
    public function sluggableAttribute()
    {
        return 'name';
    }

    /**
     * Return the attribute that contains the slug.
     *
     * @return string
     */
    protected function getSlugKey()
    {
        return 'slug';
    }
}
