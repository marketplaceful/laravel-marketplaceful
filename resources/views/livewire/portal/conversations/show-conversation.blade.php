<div>
    <article>
        <div class="mb-8">
            <h1 class="block font-bold text-5xl">
                {{ $listing->title }}
            </h1>
            <div class="text-gray-500">Listed by {{ $listing->author->name }}</div>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 col-gap-24">
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
                            <div class="text-xl">$ {{ $listing->price_for_humans }}</div>
                        </div>
                    </section>
                </section>
            </span>
            <div class="w-full grid grid-cols-1 row-gap-5">
                <livewire:marketplaceful::portal.conversations.message-list :messages="$conversation->messages" />
                <livewire:marketplaceful::portal.conversations.reply-conversation-form :conversation="$conversation" />
            </div>
        </div>
    </article>
</div>
