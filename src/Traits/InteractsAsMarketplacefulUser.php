<?php

namespace Marketplaceful\Traits;

use Marketplaceful\Models\Conversation;
use Marketplaceful\Models\Listing;
use Marketplaceful\Models\Order;

trait InteractsAsMarketplacefulUser
{
    use HasProfilePhoto;

    public static function statuses()
    {
        return [
            'active' => 'Active',
            'inactive' => 'Inactive',
        ];
    }

    public function initializeInteractsAsMarketplacefulUser()
    {
        $this->casts['last_seen_at'] = 'datetime';
        $this->casts['owner'] = 'boolean';
    }

    public function listings()
    {
        return $this->hasMany(Listing::class, 'author_id');
    }

    public function orders()
    {
        return $this->hasMany(Order::class, 'customer_id');
    }

    public function sales()
    {
        return $this->hasMany(Order::class, 'provider_id');
    }

    public function scopeActive($query)
    {
        return $query->where('status', 'active');
    }

    public function scopeSuspended($query)
    {
        return $query->where('status', 'inactive');
    }

    public function isActive()
    {
        return $this->status == 'active';
    }

    public function isSuspended()
    {
        return $this->status == 'inactive';
    }

    public function isOwner()
    {
        return $this->owner;
    }

    public function scopeOwner($query)
    {
        return $query->where('owner', 1);
    }

    public function belongsToConversation($conversation)
    {
        return $this->conversations->contains('id', $conversation->id);
    }

    public function unreadConversations()
    {
        return $this->conversations()->wherePivot('read_at', null);
    }

    public function hasReadConversation(Conversation $conversation)
    {
        return $this->conversations->find($conversation->id)->pivot->read_at;
    }

    public function conversations()
    {
        return $this->belongsToMany(Conversation::class)->withPivot('read_at');
    }

    public function getConversationNameAttribute()
    {
        if ($this->id === auth()->id()) {
            return 'You';
        }

        return $this->name;
    }

    public function ownsMessage($message)
    {
        return $message->user->id === $this->id;
    }

    public function customerForOrder($order)
    {
        return $order->customer->id === $this->id;
    }

    public function providesOrder($order)
    {
        return $order->provider->id === $this->id;
    }

    public function getStatusColorAttribute()
    {
        return [
            'active' => 'gray',
            'inactive' => 'red',
        ][$this->status] ?? 'gray';
    }

    public function getStatusLabelAttribute()
    {
        return self::statuses()[$this->status] ?? '';
    }
}
