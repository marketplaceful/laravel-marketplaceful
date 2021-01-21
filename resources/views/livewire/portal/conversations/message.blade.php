<div>
    <div class="flex mb-2">
        <div class="mr-2">
            <img src="{{ $message->user->profile_photo_url }}" alt="{{ $message->user->name }}" class="rounded-full h-10">
        </div>
        <div>
            <div class="bg-gray-200 rounded p-2">
                {{ $message->body }}
            </div>
            <span class="text-gray-400 text-sm">{{ $message->user->conversation_name }}</span>
        </div>
    </div>
</div>
