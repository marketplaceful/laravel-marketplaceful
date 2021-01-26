<?php

namespace Marketplaceful\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Marketplaceful\Marketplaceful;
use Marketplaceful\Traits\Unguarded;

class Order extends Model
{
    use HasFactory;
    use Unguarded;

    const STATUSES = [
        'open' => 'Open',
        'pending' => 'Pending',
        'accepted' => 'Accepted',
        'declined' => 'Declined',
        'delivered' => 'Delivered',
        'cancelled' => 'Cancelled',
    ];

    protected $casts = [
        'listing_id' => 'integer',
        'provider_id' => 'integer',
        'customer_id' => 'integer',
    ];

    public function listing()
    {
        return $this->belongsTo(Listing::class);
    }

    public function customer()
    {
        return $this->belongsTo(Marketplaceful::userModel());
    }

    public function provider()
    {
        return $this->belongsTo(Marketplaceful::userModel());
    }

    public function conversation()
    {
        return $this->hasOne(Conversation::class);
    }

    public function markAsOpen()
    {
        $this->update([
            'status' => 'open',
        ]);
    }

    public function markAsPending()
    {
        $this->update([
            'status' => 'pending',
        ]);
    }

    public function markAsAccepted()
    {
        $this->update([
            'status' => 'accepted',
        ]);
    }

    public function markAsDelivered()
    {
        $this->update([
            'status' => 'delivered',
        ]);
    }

    public function markAsDeclined()
    {
        $this->update([
            'status' => 'declined',
        ]);
    }

    public function markAsCancelled()
    {
        $this->update([
            'status' => 'cancelled',
        ]);
    }

    public function isOpen()
    {
        return $this->status === 'open';
    }

    public function isPending()
    {
        return $this->status === 'pending';
    }

    public function isAccepted()
    {
        return $this->status === 'accepted';
    }

    public function isDelivered()
    {
        return $this->status === 'delivered';
    }

    public function isDeclined()
    {
        return $this->status === 'declined';
    }

    public function isCancelled()
    {
        return $this->status === 'cancelled';
    }

    public function getStatusColorAttribute()
    {
        return [
            'open' => 'yellow',
            'pending' => 'yellow',
            'accepted' => 'green',
        ][$this->status] ?? 'gray';
    }

    public function getStatusLabelAttribute()
    {
        return self::STATUSES[$this->status] ?? '';
    }
}
