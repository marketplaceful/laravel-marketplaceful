<x-mkt-layouts.guest>
    <x-mkt-card.auth>
        <x-slot name="logo">
            <x-mkt-card.auth-logo />
        </x-slot>

        <x-mkt-validation-errors class="mb-4" />

        <form method="POST" action="{{ route('password.update') }}">
            @csrf

            <input type="hidden" name="token" value="{{ $request->route('token') }}">

            <div class="space-y-6">
                <div>
                    <x-mkt-label for="email" value="{{ __('Email') }}" />
                    <x-mkt-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email', $request->email)" required autofocus />
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
                        {{ __('Reset Password') }}
                    </x-mkt-button>
                </div>
            </div>
        </form>
    </x-mkt-card.auth>
</x-mkt-layouts.guest>
