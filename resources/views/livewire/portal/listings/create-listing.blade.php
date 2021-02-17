<x-mkt-portal>
    <x-slot name="header">
        <x-mkt-navbar.portal />
    </x-slot>

    <h1 class="sr-only">Create listing</h1>

    <div class="grid grid-cols-1 gap-4">
        <livewire:marketplaceful::portal.listings.create-listing-form />
    </div>
</x-mkt-portal>
