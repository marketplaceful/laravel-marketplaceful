<x-mkt-form.portal-section submit="updatePassword">
    <x-slot name="title">
        {{ __('Update Password') }}
    </x-slot>

    <x-slot name="description">
        {{ __('Ensure your account is using a long, random password to stay secure.') }}
    </x-slot>

    <x-slot name="form">
        <div class="col-span-3 sm:col-span-2">
            <x-mkt-label for="current_password" value="{{ __('Current Password') }}" />
            <x-mkt-input id="current_password" type="password" class="mt-1 block w-full" wire:model.defer="state.current_password" autocomplete="current-password" />
            <x-mkt-input.error for="current_password" class="mt-2" />
        </div>

        <div class="col-span-3 sm:col-span-2">
            <x-mkt-label for="password" value="{{ __('New Password') }}" />
            <x-mkt-input id="password" type="password" class="mt-1 block w-full" wire:model.defer="state.password" autocomplete="new-password" />
            <x-mkt-input.error for="password" class="mt-2" />
        </div>

        <div class="col-span-3 sm:col-span-2">
            <x-mkt-label for="password_confirmation" value="{{ __('Confirm Password') }}" />
            <x-mkt-input id="password_confirmation" type="password" class="mt-1 block w-full" wire:model.defer="state.password_confirmation" autocomplete="new-password" />
            <x-mkt-input.error for="password_confirmation" class="mt-2" />
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
