<x-mkt-portal>
    <x-slot name="header">
        <x-mkt-navbar.portal />
    </x-slot>

    <div class="w-full max-w-lg mx-auto">
        <livewire:marketplaceful::portal.conversations.conversation-list :conversations="$conversations" />
    </div>
</x-mkt-portal>
