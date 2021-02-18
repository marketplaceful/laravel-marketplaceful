<x-mkt-portal>
    <x-slot name="header">
        <x-mkt-navbar.portal />
    </x-slot>

    <h1 class="sr-only">Listing</h1>

    @if (count($listings) > 0)
        <ul class="space-y-4" x-max="1">
            @foreach ($listings as $listing)
                <li>
                    <a href="{{ route('marketplaceful::portal.listings.show', $listing) }}">
                        <div class="flex justify-between items-center bg-white hover:bg-gray-50 border border-gray-200 shadow-sm overflow-hidden px-4 py-4 sm:px-6 sm:rounded-md">
                            <div class="flex-1 flex items-center">
                                <div class="mr-4 flex-shrink-0">
                                    <img class="h-16 w-16 object-cover" src="{{ $listing->featureImageUrl }}">
                                </div>
                                <div>
                                    <h4 class="text-lg font-bold">{{ $listing->title }}</h4>
                                    @if ($listing->isPendingApproval())
                                        <p class="text-xs">(Pending approval)</p>
                                    @else
                                        <p class="text-xs">(Active)</p>
                                    @endif
                                </div>
                            </div>
                            <div class="hidden md:block w-40">
                                <span class="text-sm text-gray-500">{{ $listing->formattedPrice }}</span>
                            </div>
                            <div class="hidden md:block">
                                <svg viewbox="0 0 20 20" fill="currentColor" class="h-6 w-6 text-gray-400">
                                    <path fill-rule="evenodd" d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z" clip-rule="evenodd"></path>
                                </svg>
                            </div>
                        </div>
                    </a>
                </li>
            @endforeach
        </ul>
    @else
        <div class="flex justify-center px-6 pt-5 pb-6 border-2 border-gray-300 border-dashed rounded-md">
            <div class="text-center">
                <h3 class="text-lg leading-6 font-medium text-gray-900">
                    No listings found
                </h3>

                <div class="mt-2 max-w-xl text-sm text-gray-500">
                    <p>
                        Ready to list? It only takes a minute.
                    </p>
                </div>

                <div class="mt-5">
                    <x-mkt-button href="{{ route('marketplaceful::portal.listings.create') }}">New listing</x-mkt-button>
                </div>
            </div>
        </div>
    @endif
</x-mkt-portal>
