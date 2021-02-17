<?php

namespace Marketplaceful\Actions;

use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;
use Marketplaceful\Models\Conversation;

class CreateConversation
{
    public function create($user, $listing, array $input)
    {
        Gate::forUser($user)->authorize('createConversation', $listing);

        Validator::make($input, [
            'body' => 'required',
        ])->validateWithBag('createConversation');

        $conversation = Conversation::create([
            'uuid' => Str::uuid(),
            'listing_id' => $listing->id,
            'last_message_at' => now(),
        ]);

        $conversation->messages()->create([
            'user_id' => $user->id,
            'body' => $input['body'],
        ]);

        $conversation->users()->sync([
            $user->id,
            $listing->author->id,
        ]);

        return $conversation;
    }
}
