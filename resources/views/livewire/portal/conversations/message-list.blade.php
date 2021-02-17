<div class="flow-root">
    <ul class="-mb-8">
        @foreach ($messages as $message)
            <livewire:marketplaceful::portal.conversations.message :message="$message" :key="$message->id" />
        @endforeach
    </ul>
</div>
