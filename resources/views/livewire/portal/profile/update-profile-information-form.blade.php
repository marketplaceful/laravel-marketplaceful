<x-mkt-form.portal-section submit="updateProfileInformation">
    <x-slot name="title">
        {{ __('Profile information') }}
    </x-slot>

    <x-slot name="description">
        {{ __('Update your account\'s profile information and email address.') }}
    </x-slot>

    <x-slot name="form">
        <!-- Profile Photo -->
        <div x-data="{photoName: null, photoPreview: null}" class="col-span-3 sm:col-span-2">
            <!-- Profile Photo File Input -->
            <input type="file" class="hidden"
                        wire:model="photo"
                        x-ref="photo"
                        x-on:change="
                                photoName = $refs.photo.files[0].name;
                                const reader = new FileReader();
                                reader.onload = (e) => {
                                    photoPreview = e.target.result;
                                };
                                reader.readAsDataURL($refs.photo.files[0]);
                        " />

            <x-mkt-label for="photo" value="{{ __('Photo') }}" />

            <!-- Current Profile Photo -->
            <div class="mt-2" x-show="! photoPreview">
                <img src="{{ $this->user->profile_photo_url }}" alt="{{ $this->user->name }}" class="rounded-full h-20 w-20 object-cover">
            </div>

            <!-- New Profile Photo Preview -->
            <div class="mt-2" x-show="photoPreview">
                <span class="block rounded-full w-20 h-20"
                        x-bind:style="'background-size: cover; background-repeat: no-repeat; background-position: center center; background-image: url(\'' + photoPreview + '\');'">
                </span>
            </div>

            <x-mkt-button.secondary class="mt-2 mr-2" type="button" x-on:click.prevent="$refs.photo.click()">
                {{ __('Select a new photo') }}
            </x-mkt-button.secondary>

            @if ($this->user->profile_photo_path)
                <x-mkt-button.secondary type="button" class="mt-2" wire:click="deleteProfilePhoto">
                    {{ __('Remove photo') }}
                </x-mkt-button.secondary>
            @endif

            <x-mkt-input.error for="photo" class="mt-2" />
        </div>

        <!-- Name -->
        <div class="col-span-3 sm:col-span-2">
            <x-mkt-label for="name" value="{{ __('Name') }}" />
            <x-mkt-input id="name" type="text" class="mt-1 block w-full" wire:model.defer="state.name" autocomplete="name" />
            <x-mkt-input.error for="name" class="mt-2" />
        </div>

        <!-- Email -->
        <div class="col-span-3 sm:col-span-2">
            <x-mkt-label for="email" value="{{ __('Email') }}" />
            <x-mkt-input id="email" type="email" class="mt-1 block w-full" wire:model.defer="state.email" />
            <x-mkt-input.error for="email" class="mt-2" />
        </div>
    </x-slot>

    <x-slot name="actions">
        <x-mkt-form.action-message class="mr-3" on="saved">
            {{ __('Saved.') }}
        </x-mkt-form.action-message>

        <x-mkt-button wire:loading.attr="disabled" wire:target="photo">
            {{ __('Save') }}
        </x-mkt-button>
    </x-slot>
</x-mkt-form.portal-section>
