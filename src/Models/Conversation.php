<?php

namespace Marketplaceful\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Marketplaceful\Marketplaceful;
use Marketplaceful\Traits\Unguarded;

class Conversation extends Model
{
    use HasFactory;
    use Unguarded;

    protected $dates = [
        'last_message_at',
    ];

    public function users()
    {
        return $this->belongsToMany(Marketplaceful::userModel())
            ->withPivot('read_at')
            ->withTimestamps()
            ->oldest();
    }

    public function usersExceptCurrentUser()
    {
        return $this->users()->where('user_id', '!=', auth()->id());
    }

    public function receiver()
    {
        return $this->users()->where('user_id', '!=', auth()->id())->first();
    }

    public function messages()
    {
        return $this->hasMany(Message::class)->latest();
    }

    public function listing()
    {
        return $this->belongsTo(Listing::class);
    }
}
