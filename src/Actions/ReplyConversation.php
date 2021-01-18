<?php

namespace Marketplaceful\Actions;

use Illuminate\Support\Facades\Validator;

class ReplyConversation
{
    public function reply($user, $conversation, array $input)
    {
        Validator::make($input, [
            'body' => 'required',
        ])->validateWithBag('replyConversation');

        $message = $conversation->messages()->create([
            'user_id' => $user->id,
            'body' => $input['body'],
        ]);

        $conversation->update([
            'last_message_at' => now(),
        ]);

        foreach ($conversation->usersExceptCurrentUser as $user) {
            $user->conversations()->updateExistingPivot($conversation, [
                'read_at' => null,
            ]);
        }

        return $message;
    }
}
