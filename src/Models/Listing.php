<?php

namespace Marketplaceful\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use Marketplaceful\Database\Factories\ListingFactory;
use Marketplaceful\Marketplaceful;
use Marketplaceful\Traits\HasFeatureImage;
use Marketplaceful\Traits\HasPhotos;
use Marketplaceful\Traits\HasSlug;
use Marketplaceful\Traits\Unguarded;
use Spatie\SchemalessAttributes\SchemalessAttributes;

class Listing extends Model
{
    use HasFactory;
    use HasSlug;
    use Unguarded;
    use HasFeatureImage;
    use HasPhotos;

    const STATUSES = [
        'draft' => 'Draft',
        'pending_approval' => 'Pending Approval',
        'published' => 'Published',
        'closed' => 'Closed',
    ];

    protected $casts = [
        'author_id' => 'integer',
        'featured' => 'boolean',
        'photo_paths' => 'array',
        'public_metadata' => 'array',
        'private_metadata' => 'array',
        'internal_metadata' => 'array',
        'location_coordinates' => 'array',
    ];

    protected static function newFactory()
    {
        return ListingFactory::new();
    }

    public function sluggableAttribute()
    {
        return 'title';
    }

    public function author()
    {
        return $this->belongsTo(Marketplaceful::userModel());
    }

    public function tags()
    {
        return $this->belongsToMany(Tag::class, 'listings_tags', 'listing_id', 'tag_id')
            ->withPivot('order_column')
            ->orderBy('order_column', 'asc');
    }

    public function conversations()
    {
        return $this->hasMany(Conversation::class);
    }

    public function scopeTag($query, string $slug)
    {
        return $query->whereHas('tags', function ($query) use ($slug) {
            $query->where('slug', $slug);
        });
    }

    public function scopePublished($query)
    {
        return $query->whereNotNull('published_at');
    }

    public function markAsPublished()
    {
        $this->update([
            'published_at' => $this->published_at ?? $this->freshTimestamp(),
            'status' => 'published',
        ]);
    }

    public function markAsUnPublished()
    {
        $this->update(['status' => 'draft']);
    }

    public function markAsPendingApproval()
    {
        $this->update(['status' => 'pending_approval']);
    }

    public function updateLocation(array $location)
    {
        $this->forceFill([
            'location' => $location,
        ])->save();

        $this->public_metadata->set([
            'location' => ['address' => $location['address']],
        ]);
    }

    public function isPublished()
    {
        return $this->status === 'published';
    }

    public function isDraft()
    {
        return $this->status === 'draft';
    }

    public function isPendingApproval()
    {
        return $this->status === 'pending_approval';
    }

    public function getFormattedPriceAttribute()
    {
        return Marketplaceful::formatAmount($this->price);
    }

    public function getPriceForHumansAttribute()
    {
        return $this->price / 100;
    }

    public function setPriceForEditingAttribute($value)
    {
        $value = str_replace(',', '.', $value);

        $price = number_format(floatval($value) * 100, 0, '', '');

        $this->price = $price;
    }

    public function getStatusColorAttribute()
    {
        return [
            'draft' => 'pink',
            'pending_approval' => 'green',
            'published' => 'gray',
            'closed' => 'red',
        ][$this->status] ?? 'gray';
    }

    public function getStatusLabelAttribute()
    {
        return self::STATUSES[$this->status] ?? '';
    }

    public function getPublicMetadataAttribute()
    {
        return SchemalessAttributes::createForModel($this, 'public_metadata');
    }

    public function getPrivateMetadataAttribute()
    {
        return SchemalessAttributes::createForModel($this, 'private_metadata');
    }

    public function getInternalMetadataAttribute()
    {
        return SchemalessAttributes::createForModel($this, 'internal_metadata');
    }

    public function setLocationAttribute(array $coordinates)
    {
        $this->location_coordinates = [
            'longitude', $coordinates['longitude'],
            'latitude', $coordinates['latitude'],
        ];

        $this->location_geometry = (function () use ($coordinates) {
            if (config('database.default') === 'mysql') {
                return DB::raw('ST_SRID(Point('.$coordinates['longitude'].', '.$coordinates['latitude'].'), 4326)');
            }

            if (config('database.default') === 'sqlite') {
                throw new \Exception('Listing location does not support SQLite.');
            }

            if (config('database.default') === 'pgsql') {
                return DB::raw('ST_MakePoint('.$coordinates['longitude'].', '.$coordinates['latitude'].')');
            }
        })();
    }
}
