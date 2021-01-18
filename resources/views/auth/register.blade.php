<x-mkt-layouts.guest>
    <x-mkt-card.auth>
        <x-slot name="logo">
            <x-mkt-card.auth-logo />
        </x-slot>

        <x-mkt-validation-errors class="mb-4" />

        <form method="POST" action="{{ route('register') }}">
            @csrf

            <div class="space-y-6">
                <div>
                    <x-mkt-label for="name" value="{{ __('Name') }}" />
                    <x-mkt-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')" required autofocus autocomplete="name" />
                </div>

                <div>
                    <x-mkt-label for="email" value="{{ __('Email') }}" />
                    <x-mkt-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required />
                </div>

                <div>
                    <x-mkt-label for="password" value="{{ __('Password') }}" />
                    <x-mkt-input id="password" class="block mt-1 w-full" type="password" name="password" required autocomplete="new-password" />
                </div>

                <div>
                    <x-mkt-label for="password_confirmation" value="{{ __('Confirm Password') }}" />
                    <x-mkt-input id="password_confirmation" class="block mt-1 w-full" type="password" name="password_confirmation" required autocomplete="new-password" />
                </div>

                <div>
                    <x-mkt-button class="w-full">
                        {{ __('Register') }}
                    </x-mkt-button>
                </div>

                <div class="text-sm text-gray-600">
                    {{ __('Already registered?') }}

                    <a class="underline text-sm text-gray-600 hover:text-gray-900" href="{{ route('login') }}">
                        {{ __('Log in') }}
                    </a>
                </div>
            </div>
        </form>
    </x-mkt-card.auth>
</x-mkt-layouts.guest>
