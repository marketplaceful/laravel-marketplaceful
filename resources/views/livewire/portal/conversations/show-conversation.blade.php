<x-mkt-portal>
    <x-slot name="header">
        <x-mkt-navbar.portal />
    </x-slot>

    <div class="w-full max-w-lg mx-auto">
        <div>
            <div class="divide-y divide-gray-200">
                <div class="pb-4">
                    <h1 class="text-2xl font-bold text-gray-900">{{ $listing->title }}</h1>
                    <p class="mt-2 text-sm text-gray-500">
                        {{ $listing->formattedPrice }}
                    </p>
                </div>
                <div
                    class="pt-6">
                    <!-- Activity feed-->
                    <livewire:marketplaceful::portal.conversations.message-list :messages="$conversation->messages" />
                    <div class="mt-6">
                    </div>
                </div>
            </div>
        </div>

        <div class="grid grid-cols-1 row-gap-5">
            <livewire:marketplaceful::portal.conversations.reply-conversation-form :conversation="$conversation" />
        </div>
    </div>
</x-mkt-portal>
