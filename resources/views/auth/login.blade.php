<x-mkt-layouts.guest>
    <x-mkt-card.auth>
        <x-slot name="logo">
            <x-mkt-card.auth-logo />

            <h2 class="mt-6 text-center text-3xl font-extrabold text-gray-900">
                Log in to {{ config('app.name') }}
            </h2>
        </x-slot>

        <x-mkt-validation-errors class="mb-4" />

        @if (session('status'))
            <div class="mb-4 font-medium text-sm text-green-600">
                {{ session('status') }}
            </div>
        @endif

        <form method="POST" action="{{ route('login') }}">
            @csrf

            <div class="space-y-6">
                <div>
                    <x-mkt-label for="email" value="{{ __('Email') }}" />
                    <x-mkt-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autofocus />
                </div>

                <div>
                    <x-mkt-label for="password" value="{{ __('Password') }}" />
                    <x-mkt-input id="password" class="block mt-1 w-full" type="password" name="password" required autocomplete="current-password" />
                </div>

                <div class="flex items-center justify-between">
                    <div class="flex items-center">
                        <x-mkt-input.checkbox id="remember_me" name="remember" class="h-4 w-4" />
                        <label for="remember_me" class="ml-2 block text-sm text-gray-900">
                            {{ __('Remember me') }}
                        </label>
                    </div>

                    @if (Route::has('password.request'))
                        <div class="text-sm">
                            <a href="{{ route('password.request') }}" class="underline text-sm text-gray-600 hover:text-gray-900">
                                {{ __('Forgot your password?') }}
                            </a>
                        </div>
                    @endif
                </div>

                <div>
                    <x-mkt-button class="w-full">
                        {{ __('Log in') }}
                    </x-mkt-button>
                </div>
            </div>
        </form>
    </x-mkt-card.auth>
</x-mkt-layouts.guest>
