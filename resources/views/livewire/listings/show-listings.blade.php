<x-mkt-layouts.dashboard>
    <x-slot name="header">
        <x-mkt-page-heading class="pt-6">
            <h1 class="text-2xl font-bold leading-7 text-gray-900 sm:text-3xl sm:leading-9 sm:truncate">
                Listings
            </h1>
        </x-mkt-page-heading>

        <x-mkt-tab class="pt-6">
            <x-mkt-tab.link wire:click.prevent="$set('filters.status', '')" href="{{ route('marketplaceful::listings.index') }}" :active="empty($filters['status'])">
                All listings
            </x-mkt-tab.link>

            <x-mkt-tab.link wire:click.prevent="$set('filters.status', 'draft')" href="{{ route('marketplaceful::listings.index') }}" :active="$filters['status'] === 'draft'">
                Draft
            </x-mkt-tab.link>

            <x-mkt-tab.link wire:click.prevent="$set('filters.status', 'pending_approval')" href="{{ route('marketplaceful::listings.index') }}" :active="$filters['status'] === 'pending_approval'">
                Pending approval
            </x-mkt-tab.link>

            <x-mkt-tab.link wire:click.prevent="$set('filters.status', 'published')" href="{{ route('marketplaceful::listings.index') }}" :active="$filters['status'] === 'published'">
                Published
            </x-mkt-tab.link>

            <x-mkt-tab.link wire:click.prevent="$set('filters.status', 'closed')" href="{{ route('marketplaceful::listings.index') }}" :active="$filters['status'] === 'closed'">
                Closed
            </x-mkt-tab.link>
        </x-mkt-tab>
    </x-slot>

    <div class="max-w-5xl mx-auto py-10 sm:px-6 lg:px-8">
        <div class="flex">
            <div class="relative rounded shadow-sm w-full">
                <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                    <svg class="h-5 w-5 text-green-500" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
                        <path fill-rule="evenodd" d="M8 4a4 4 0 100 8 4 4 0 000-8zM2 8a6 6 0 1110.89 3.476l4.817 4.817a1 1 0 01-1.414 1.414l-4.816-4.816A6 6 0 012 8z" clip-rule="evenodd" />
                    </svg>
                </div>
                <input type="text" wire:model="filters.search" placeholder="Search for listings..." class="border-gray-300 focus:border-green-300 focus:ring focus:ring-green-200 focus:ring-opacity-50 block w-full rounded pl-10 sm:text-sm sm:leading-5" />
            </div>
        </div>

        <x-mkt-form.section-border />

        <div class="flex-col space-y-4">
            <x-mkt-table>
                <x-slot name="head">
                    <x-mkt-table.heading sortable wire:click="sortBy('title')" :direction="$sortField === 'title' ? $sortDirection : null" class="w-full pl-0">Title</x-mkt-table.heading>
                    <x-mkt-table.heading sortable wire:click="sortBy('status')" :direction="$sortField === 'status' ? $sortDirection : null" class="hidden md:table-cell">Status</x-mkt-table.heading>
                    <x-mkt-table.heading sortable wire:click="sortBy('updated_at')" :direction="$sortField === 'updated_at' ? $sortDirection : null" class="hidden md:table-cell whitespace-nowrap pr-0">Last Update</x-mkt-table.heading>
                </x-slot>

                <x-slot name="body">
                    @forelse($listings as $listing)
                    <x-mkt-table.row wire:loading.class.delay="opacity-50" wire:key="row-{{ $listing->id }}">
                        <x-mkt-table.cell class="pl-0">
                            <div class="flex flex-col">
                                <a href="{{ route('marketplaceful::listings.show', $listing) }}" class="group inline-flex truncate text-base leading-6 font-semibold">
                                    <h3 class="text-gray-800 truncate group-hover:underline transition ease-in-out duration-150">
                                        {{ $listing->title }}
                                    </h3>
                                </a>
                                <p class="text-gray-400 truncate leading-5">
                                    By <a href="#" class="font-medium hover:underline">{{ $listing->author->name }}</a>
                                </p>
                                <span class="md:hidden pt-1">
                                    <x-mkt-badge.status :color="$listing->status_color">
                                        {{ $listing->status_label }}
                                    </x-mkt-badge.status>
                                </span>
                            </div>
                        </x-mkt-table.cell>
                        <x-mkt-table.cell class="hidden md:table-cell">
                            <x-mkt-badge.status :color="$listing->status_color">
                                {{ $listing->status_label }}
                            </x-mkt-badge.status>
                        </x-mkt-table.cell>
                        <x-mkt-table.cell class="hidden md:table-cell pr-0">
                            <span class="text-gray-500">{{ $listing->updated_at->diffForHumans() }}</span>
                        </x-mkt-table.cell>
                    </x-mkt-table.row>
                    @empty
                    <x-mkt-table.row>
                        <x-mkt-table.cell colspan="3">
                            <div class="flex flex-col justify-center items-center">
                                <span class="font-medium py-8 text-gray-400 text-xl">No listings match the current filter</span>
                                <x-mkt-button href="{{ route('marketplaceful::listings.index') }}">Show all listings</x-mkt-button>
                            </div>
                        </x-mkt-table.cell>
                    </x-mkt-table.row>
                    @endforelse
                </x-slot>
            </x-mkt-table>

            <div>
                {{ $listings->links() }}
            </div>
        </div>
    </div>
</x-mkt-layouts.dashboard>
