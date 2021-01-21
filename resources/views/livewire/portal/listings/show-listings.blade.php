<div>
    <h1 class="sr-only">Listing</h1>

    <div class="grid grid-cols-1 gap-4">
        <div class="grid gap-5 lg:grid-cols-2">
            @foreach ($listings as $listing)
                <div class="flex flex-col rounded-lg shadow overflow-hidden">
                    <div class="flex-shrink-0">
                        <img class="h-48 w-full object-cover" src="{{ $listing->featureImageUrl }}">
                    </div>
                    <div class="flex-1 bg-white p-4 flex flex-col justify-between">
                        <div class="flex-1">
                            <a href="{{ route('marketplaceful::portal.listings.show', $listing) }}" class="block">
                                <p class="text-lg font-semibold text-gray-900">
                                    {{ $listing->title }}
                                </p>
                                <div class="mt-1">
                                    <span class="text-base text-gray-900">{{ $listing->formattedPrice }}</span>
                                </div>
                            </a>
                        </div>
                    </div>
                    <div>
                        <div class="-mt-px flex divide-x divide-gray-200 bg-white border-t border-gray-200">
                            <div class="w-0 flex-1 flex">
                                <a href="{{ route('marketplaceful::portal.listings.show', $listing) }}" class="relative -mr-px w-0 flex-1 inline-flex items-center justify-center py-4 text-sm text-gray-700 font-medium border border-transparent rounded-bl-lg hover:text-gray-500">
                                    <span">Edit listing</span>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</div>
