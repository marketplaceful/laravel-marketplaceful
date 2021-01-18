<?php

namespace Marketplaceful\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Marketplaceful\Database\Factories\TagFactory;
use Marketplaceful\Traits\HasSlug;
use Marketplaceful\Traits\Unguarded;

class Tag extends Model
{
    use HasFactory;
    use HasSlug;
    use Unguarded;

    protected static function newFactory()
    {
        return TagFactory::new();
    }

    public function listings()
    {
        return $this->belongsToMany(Listing::class, 'listings_tags', 'tag_id', 'listing_id');
    }

    protected static function boot()
    {
        parent::boot();

        static::deleting(function ($item) {
            $item->listings()->detach();
        });
    }
}
