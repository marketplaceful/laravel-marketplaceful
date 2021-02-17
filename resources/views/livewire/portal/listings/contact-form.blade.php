<x-mkt-form.portal-section-simple submit="createConversation">
    <x-slot name="title">
        Contact {{ $listing->author->name }}
    </x-slot>

    <x-slot name="description">
        Once you send a message, {{ $listing->author->name }} can invite you to purchase the listing.
    </x-slot>

    <x-slot name="form">
        <div class="col-span-3">
            <x-mkt-label for="message" value="Message" />
            <x-mkt-input.textarea id="message" rows="3" class="mt-1 block w-full" wire:model.defer="message" placeholder="Start your message..." />
            <x-mkt-input.error for="message" class="mt-2" />
        </div>
    </x-slot>

    <x-slot name="actions">
        <x-mkt-button>
            Send message
        </x-mkt-button>
    </x-slot>
</x-mkt-form.portal-section-simple>
