<x-mkt-form.dashboard-section submit="updateTag">
    <x-slot name="title">
        Basic settings
    </x-slot>

    <x-slot name="form">
        <div class="col-span-6 sm:col-span-4">
            <x-mkt-label for="name" value="Name" />
            <x-mkt-input id="name" type="text" class="mt-1 block w-full" wire:model.defer="state.name" autofocus />
            <x-mkt-input.error for="name" class="mt-2" />
        </div>

        <div class="col-span-6 sm:col-span-4">
            <x-mkt-label for="slug" value="Slug" />
            <x-mkt-input id="slug" type="text" class="mt-1 block w-full" wire:model.defer="state.slug" />
            <x-mkt-input.error for="slug" class="mt-2" />
        </div>
    </x-slot>

    <x-slot name="actions">
        <x-mkt-form.action-message class="mr-3" on="saved">
            Saved.
        </x-mkt-form.action-message>

        <x-mkt-button>
            Save
        </x-mkt-button>
    </x-slot>
</x-mkt-form.dashboard-section>
