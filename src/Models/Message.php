<?php

namespace Marketplaceful\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Marketplaceful\Marketplaceful;
use Marketplaceful\Traits\Unguarded;

class Message extends Model
{
    use HasFactory;
    use Unguarded;

    public function conversation()
    {
        return $this->belongsTo(Conversation::class);
    }

    public function user()
    {
        return $this->belongsTo(Marketplaceful::userModel());
    }
}
