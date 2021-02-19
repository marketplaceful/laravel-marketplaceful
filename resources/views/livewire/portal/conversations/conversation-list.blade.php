<div>
    @if (count($conversations) > 0)
        <div class="bg-white shadow-sm border border-gray-200 overflow-hidden sm:rounded-md">
            <ul class="divide-y divide-gray-200">
                @foreach($conversations as $conversation)
                    <li>
                        <a href="{{ route('marketplaceful::portal.messages.show', $conversation->uuid) }}" class="block hover:bg-gray-50">
                            <div class="flex items-center px-4 py-4 sm:px-6">
                                <div class="min-w-0 flex-1 flex items-center">
                                    <div class="flex-shrink-0">
                                        <div class="relative">
                                            <img class="h-10 w-10 rounded-full bg-gray-400 flex items-center justify-center ring-8 ring-white" src="{{ $conversation->receiver()->profile_photo_url }}" alt="">

                                            <span class="absolute -bottom-0.5 -right-1 bg-white rounded-tl px-0.5 py-px">
                                                <img class="h-5 w-5 object-cover" src="{{ $conversation->listing->featureImageUrl }}" alt="">
                                            </span>
                                        </div>
                                    </div>
                                    <div class="min-w-0 flex-1 px-4 md:grid md:grid-cols-2 md:gap-4">
                                        <div>
                                            <p class="text-sm font-medium text-gray-900 truncate flex items-center">
                                                @unless (auth()->user()->hasReadConversation($conversation))
                                                    <span class="bg-blue-500 mr-2 h-3 w-3 rounded-full"></span>
                                                @endif

                                                <span>{{ $conversation->receiver()->name }}</span>
                                            </p>
                                            <p class="mt-2 text-sm text-gray-500">
                                                <span class="truncate">{{ $conversation->listing->title }}</span>
                                            </p>
                                        </div>
                                        <div class="hidden md:block">
                                            <div>
                                                <p class="text-sm text-gray-900">
                                                    <time datetime="{{ $conversation->last_message_at->format('Y-m-d') }}">{{ $conversation->last_message_at->diffForHumans() }}</time>
                                                </p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div>
                                    <svg class="h-5 w-5 text-gray-400" x-description="Heroicon name: solid/chevron-right" xmlns="http://www.w3.org/2000/svg" viewbox="0 0 20 20" fill="currentColor" aria-hidden="true">
                                        <path fill-rule="evenodd" d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z" clip-rule="evenodd"></path>
                                    </svg>
                                </div>
                            </div>
                        </a>
                    </li>
                @endforeach
            </ul>
        </div>
    @else
        <div class="flex justify-center px-6 pt-5 pb-6 border-2 border-gray-300 border-dashed rounded-md">
            <div class="text-center">
                <h3 class="text-lg leading-6 font-medium text-gray-900 my-10">
                    No messages
                </h3>
            </div>
        </div>
    @endif
</div>
