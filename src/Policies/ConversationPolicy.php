<?php

namespace Marketplaceful\Policies;

use Illuminate\Auth\Access\HandlesAuthorization;
use Marketplaceful\Models\Conversation;

class ConversationPolicy
{
    use HandlesAuthorization;

    public function show($user, Conversation $conversation)
    {
        return $user->belongsToConversation($conversation);
    }
}
