<x-mkt-portal>
    <x-slot name="header">
        <x-mkt-navbar.portal />
    </x-slot>

    <h1 class="sr-only">Profile</h1>

    <div class="grid grid-cols-1 gap-4">
        @if (Laravel\Fortify\Features::canUpdateProfileInformation())
            <livewire:marketplaceful::portal.update-profile-information-form />
        @endif

        @if (Laravel\Fortify\Features::enabled(Laravel\Fortify\Features::updatePasswords()))
            <livewire:marketplaceful::portal.update-password-form />
        @endif
    </div>
</x-mkt-portal>
