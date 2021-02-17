<x-mkt-portal>
    <x-slot name="header">
        <x-mkt-navbar.portal />
    </x-slot>

    <h1 class="sr-only">Contact</h1>

    <div class="grid grid-cols-1 gap-4">
        <livewire:marketplaceful::portal.listings.contact-form :listing="$listing" />
    </div>
</x-mkt-portal>
