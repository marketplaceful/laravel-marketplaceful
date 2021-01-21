<div>
    @foreach ($messages as $message)
        @if (auth()->user()->ownsMessage($message))
            <livewire:marketplaceful::portal.conversations.message-own :message="$message" :key="$message->id" />
        @else
            <livewire:marketplaceful::portal.conversations.message :message="$message" :key="$message->id" />
        @endif
    @endforeach
</div>
