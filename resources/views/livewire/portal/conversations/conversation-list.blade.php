<div class="rounded border border-gray-200 divide-y divide-y divide-gray-200 overflow-hidden">
    @foreach($conversations as $conversation)
        <a href="{{ route('marketplaceful::portal.conversations.show', $conversation->uuid) }}" class="block bg-white hover:bg-gray-100 p-4">
            <div class="font-bold text-gray-600">
                @foreach ($conversation->users as $user)
                    {{ $user->conversation_name }}@if ($conversation->users->last() != $user), @endif
                @endforeach
            </div>

            <p class="text-gray-600 flex items-center">
                @unless (auth()->user()->hasReadConversation($conversation))
                    <span class="bg-purple-200 mr-2 h-4 w-4 rounded-full"></span>
                @endif
                <span>{{ $conversation->messages->first()->body }}</span>
            </p>
        </a>
    @endforeach
</div>
