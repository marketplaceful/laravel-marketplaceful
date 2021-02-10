<x-mkt-form.dashboard-section submit="updateListing">
    <x-slot name="title">
        Listing Details
    </x-slot>

    <x-slot name="form">
        <div class="col-span-6 sm:col-span-4">
            <x-mkt-label for="title" value="Title" />
            <x-mkt-input id="title" type="text" class="mt-1 block w-full" wire:model.defer="state.title" autofocus />
            <x-mkt-input.error for="title" class="mt-2" />
        </div>

        <div class="col-span-6 sm:col-span-4">
            <x-mkt-label for="price" value="Price" />
            <div class="mt-1 relative rounded-md shadow-sm">
                <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                    <span class="text-gray-500 sm:text-sm">
                        $
                    </span>
                </div>
                <input wire:model.defer="state.price" id="price" class="focus:ring-gray-500 focus:border-gray-500 block w-full pl-7 pr-12 sm:text-sm border-gray-300 rounded-md" placeholder="0.00" step="0.01" type="number" />
                <div class="absolute inset-y-0 right-0 pr-3 flex items-center pointer-events-none">
                    <span class="text-gray-500 sm:text-sm">
                        USD
                    </span>
                </div>
            </div>
            <x-mkt-input.error for="price" class="mt-2" />
        </div>

        <div x-data="{imageName: null, imagePreview: null}" class="col-span-6 sm:col-span-4">
            <!-- Feature Image File Input -->
            <input type="file" class="hidden"
                        wire:model="image"
                        x-ref="image"
                        x-on:change="
                                imageName = $refs.image.files[0].name;
                                const reader = new FileReader();
                                reader.onload = (e) => {
                                    imagePreview = e.target.result;
                                };
                                reader.readAsDataURL($refs.image.files[0]);
                        " />

            <x-mkt-label for="image" value="Image" />

            <!-- Current Profile Photo -->
            <div class="mt-2" x-show="! imagePreview">
                <img src="{{ $listing->feature_image_url }}" class="rounded h-40">
            </div>

            <!-- New Feature Image Preview -->
            <div class="mt-2" x-show="imagePreview">
                <span class="block rounded h-40"
                      x-bind:style="'background-size: cover; background-repeat: no-repeat; background-position: center center; background-image: url(\'' + imagePreview + '\');'">
                </span>
            </div>

            <x-mkt-button.secondary class="mt-2" type="button" x-on:click.prevent="$refs.image.click()">
                Select A New Image
            </x-mkt-button.secondary>

            <x-mkt-input.error for="image" class="mt-2" />
        </div>

        <div class="col-span-6">
            <x-mkt-label for="photos.*" value="Photos" />

            <x-mkt-input.filepond wire:model="uploads" :files="$listing->photos_for_filepond" class="mt-2" multiple />

            <x-mkt-input.error for="uploads.*" class="mt-2" />
            <x-mkt-input.error for="photos.*" class="mt-2" />
        </div>

        <div class="col-span-6">
            <x-mkt-label for="description" value="Description" />
            <x-mkt-input.textarea id="description" rows="3" class="mt-1 block w-full" wire:model.defer="state.description" />
            <x-mkt-input.error for="description" class="mt-2" />
        </div>

        <div class="col-span-6 sm:col-span-4">
            <x-mkt-label for="tags" value="Tags" />
            <div x-data="{
                newTag: '',
                incomingTags: @entangle('currentTags'),
                options: [
                    @foreach ($this->tags->pluck('name', 'id') as $key => $option)
                        { id: '{{ $key }}', name: '{{ $option }}', selected: false },
                    @endforeach
                ],
                selected: [],
                select(index) {
                    if (!this.options[index].selected) {
                        this.options[index].selected = true;
                        this.selected.push(index);
                    } else {
                        this.selected.splice(this.selected.lastIndexOf(index), 1);
                        this.options[index].selected = false
                    }
                    this.incomingTags = this.selectedValues();
                    this.newTag = '';
                },
                remove(index, option) {
                    this.options[option].selected = false;
                    this.selected.splice(index, 1);
                    this.incomingTags = this.selectedValues();
                },
                selectedValues() {
                    return this.selected.map((option) => {
                        return this.options[option].id;
                    })
                },
                loadSelected() {
                    this.incomingTags.forEach((tag) => {
                        index = this.options.findIndex(option => option.id == tag);
                        this.select(index);
                    })
                },
            }" x-init="loadSelected()">
                <select x-model="newTag" x-on:change="select(newTag)" class="mt-1 shadow-sm focus:ring-gray-500 focus:border-gray-500 block w-full sm:text-sm border-gray-300 rounded-md">
                    <option></option>
                    <template x-for="(option, index) in options" :key="index">
                        <option :value="index" x-text="option.name" x-bind:disabled="option.selected"></option>
                    </template>
                </select>
                <div class="mt-2">
                    <template x-for="(option, index) in selected" :key="index">
                        <span class="inline-flex items-center px-3 py-0.5 rounded-full text-sm font-medium leading-5 bg-gray-100 text-gray-800 mb-2 mr-2">
                            <span class="whitespace-nowrap" x-text="options[option].name"></span>
                            <button type="button" class="flex-shrink-0 -mr-0.5 ml-1.5 inline-flex text-gray-500 focus:outline-none focus:text-gray-700" x-on:click="remove(index, option)">
                                <svg class="h-2 w-2" stroke="currentColor" fill="none" viewBox="0 0 8 8">
                                    <path stroke-linecap="round" stroke-width="1.5" d="M1 1l6 6m0-6L1 7" />
                                </svg>
                            </button>
                        </span>
                    </template>
                </div>
                <x-mkt-input.error for="tags" class="mt-2" />
            </div>
        </div>
    </x-slot>

    <x-slot name="actions">
        <x-mkt-form.action-message class="mr-3" on="saved">
            Saved.
        </x-mkt-form.action-message>

        <x-mkt-button>
            Save
        </x-mkt-button>
    </x-slot>
</x-mkt-form.dashboard-section>
