<?php

namespace Marketplaceful\Actions;

use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;

class CreateConversation
{
    public function create($user, $order, array $input)
    {
        Gate::forUser($user)->authorize('createConversation', $order);

        Validator::make($input, [
            'body' => 'required',
        ])->validateWithBag('createConversation');

        $conversation = $order->conversation()->create([
            'uuid' => Str::uuid(),
            'last_message_at' => now(),
        ]);

        $conversation->messages()->create([
            'user_id' => $user->id,
            'body' => $input['body'],
        ]);

        $conversation->users()->sync([
            $user->id,
            $order->provider->id,
        ]);

        return $conversation;
    }
}
