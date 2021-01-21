<form wire:submit.prevent="createOrder">
    <x-mkt-label for="message" value="Message" />
    <x-mkt-input.textarea id="message" rows="3" class="mt-1 block w-full" wire:model.defer="message" placeholder="Type your message" />
    <x-mkt-input.error for="message" class="mt-2" />

    <div class="mt-4">
        <x-mkt-button>
            Purchase
        </x-mkt-button>
    </div>
</form>
