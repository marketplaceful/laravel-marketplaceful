<x-mkt-layouts.dashboard>
    <x-slot name="header">
        <x-mkt-page-heading class="py-6">
            <div class="flex items-center">
                <x-mkt-back-link href="{{ route('marketplaceful::tags.index') }}" class="mr-4" />

                <h1 class="text-2xl font-bold leading-7 text-gray-900 sm:text-3xl sm:leading-9 sm:truncate">
                    Create tag
                </h1>
            </div>
        </x-mkt-page-heading>
    </x-slot>

    <div class="max-w-5xl mx-auto py-10 sm:px-6 lg:px-8">
        <livewire:marketplaceful::tags.create-tag-form />
    </div>
</x-mkt-layouts.dashboard>
