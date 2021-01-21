<div>
    <h1 class="sr-only">Checkout</h1>

    <div class="grid grid-cols-1 gap-4">
        <section>
            <div class="rounded-lg bg-white overflow-hidden shadow">
                <div class="flex-1 bg-white p-6 flex flex-col justify-between">
                    <div class="flex-1">
                        <p class="text-5xl font-semibold text-gray-900">
                            {{ $listing->title }}
                        </p>
                    </div>
                    <div class="mt-4 flex items-center">
                        <div class="flex-shrink-0">
                            <a href="#">
                                <span class="sr-only">{{ $listing->author->name }}</span>
                                <img class="h-10 w-10 rounded-full" src="{{ $listing->author->profile_photo_url }}">
                            </a>
                        </div>
                        <div class="ml-3">
                            <p class="text-sm font-medium text-gray-900">
                                {{ $listing->author->name }}
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <section>
            <div class="rounded-lg bg-white overflow-hidden shadow">
                <div class="bg-white p-6">
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-12">
                        <span class="hidden md:block">
                            <section class="block">
                                <section class="flex align-center mb-8">
                                    <img class="w-32 h-32 flex-shrink-0 rounded-lg shadow object-cover mr-5" src="{{ $listing->feature_image_url }}" alt="">
                                    <div class="flex flex-col justify-center flex-1">
                                        <h3 class="font-bold block text-lg ">
                                            {{ $listing->title }}
                                        </h3>
                                    </div>
                                    <div class="flex flex-col justify-center items-end">
                                        <div class="text-xl">{{ $listing->formattedPrice }}</div>
                                    </div>
                                </section>
                            </section>
                        </span>
                        <div class="w-full grid grid-cols-1 row-gap-5">
                            <livewire:marketplaceful::portal.listings.checkout-form :listing="$listing" />
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
</div>
