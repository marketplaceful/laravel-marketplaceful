<x-mkt-layouts.dashboard>
    <x-slot name="header">
        <x-mkt-page-heading class="py-6">
            <div class="flex items-center">
                <x-mkt-back-link href="{{ route('marketplaceful::listings.index') }}" class="mr-4" />

                <h1 class="text-2xl font-bold leading-7 text-gray-900 sm:text-3xl sm:leading-9 sm:truncate">
                    {{ $listing->title }}
                </h1>
            </div>

            <x-slot name="actions">
                <div class="space-x-2">
                    @if ($listing->isPublished())
                    <livewire:marketplaceful::listings.un-publish-listing-form :listing="$listing" />
                    @elseif ($listing->isPendingApproval())
                    <livewire:marketplaceful::listings.reject-listing-form :listing="$listing" />
                    <livewire:marketplaceful::listings.publish-listing-form :listing="$listing" />
                    @else
                    <livewire:marketplaceful::listings.publish-listing-form :listing="$listing" />
                    @endif
                </div>
            </x-slot>
        </x-mkt-page-heading>
    </x-slot>

    <div class="max-w-5xl mx-auto py-10 sm:px-6 lg:px-8">
        <livewire:marketplaceful::listings.update-listing-form :listing="$listing" />

        <x-mkt-form.section-border />

        <livewire:marketplaceful::listings.update-listing-settings-form :listing="$listing" />

        <x-mkt-form.section-border />

        <livewire:marketplaceful::listings.update-listing-metadata-form :listing="$listing" />

        <x-mkt-form.section-border />

        <div class="mt-10 sm:mt-0">
            <livewire:marketplaceful::listings.delete-listing-form :listing="$listing" />
        </div>
    </div>
</x-mkt-layouts.dashboard>
