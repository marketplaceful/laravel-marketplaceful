<x-mkt-portal>
    <x-slot name="header">
        <x-mkt-navbar.portal />
    </x-slot>

    <h1 class="sr-only">Update listing</h1>

    <div class="grid grid-cols-1 gap-4">
        <div class="px-4 sm:p-0">
            <div class="flex items-start space-x-5">
                <div class="flex-shrink-0">
                    <div class="relative">
                        <img class="h-16 w-16  object-cover" src="{{ $listing->featureImageUrl }}" alt="">
                    </div>
                </div>

                <div class="pt-1.5">
                    <h1 class="text-2xl font-bold text-gray-900">{{ $listing->title }}</h1>
                    <p class="text-sm font-medium text-gray-500">
                         @if ($listing->isPendingApproval())
                            Pending approval
                        @else
                            Active
                        @endif
                    </p>
                </div>
            </div>
        </div>

        <div class="grid grid-cols-1 gap-10">
            <div class="px-4 sm:p-0">
                <div class="sm:hidden">
                    <label for="tabs" class="sr-only">Select a tab</label>
                    <select id="tabs" name="tabs" class="block w-full pl-3 pr-10 py-2 text-base border-gray-300 focus:outline-none focus:ring-gray-500 focus:border-gray-500 sm:text-sm rounded-md">
                        <option>Edit</option>
                        <option>Remove</option>
                    </select>
                </div>
                <div class="hidden sm:block">
                    <div class="border-b border-gray-200">
                        <nav class="-mb-px flex space-x-8" aria-label="Tabs">
                            <a href="#" class="border-gray-400 text-gray-800 whitespace-nowrap py-4 px-1 border-b-2 font-medium text-sm">
                                Edit
                            </a>
                            <a href="#" class="border-transparent text-gray-500 hover:text-gray-700 hover:border-gray-300 whitespace-nowrap py-4 px-1 border-b-2 font-medium text-sm">
                                Remove
                            </a>
                        </nav>
                    </div>
                </div>
            </div>

            <livewire:marketplaceful::portal.listings.update-listing-form :listing="$listing" />
        </div>
    </div>
</x-mkt-portal>
