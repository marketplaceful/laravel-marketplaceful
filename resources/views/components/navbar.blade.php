<nav x-data="{ open: false }" @keydown.window.escape="open = false" class="bg-gray-50">
    <!-- Primary Navigation Menu -->
    <div class="max-w-5xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex items-center justify-between h-16">
            <div class="flex items-center">
                <div class="flex-shrink-0">
                    <a href="/marketplaceful">
                        <x-mkt-application-mark class="block h-8 w-auto" />
                    </a>
                </div>
                <div class="hidden md:block">
                    <div class="ml-10 flex items-baseline space-x-4">
                        <x-mkt-navigation.dashboard-link href="{{ route('marketplaceful::listings.index') }}" :active="request()->routeIs('marketplaceful::listings.*')">
                            Listings
                        </x-mkt-navigation.dashboard-link>

                        <x-mkt-navigation.dashboard-link href="{{ route('marketplaceful::tags.index') }}" :active="request()->routeIs('marketplaceful::tags.*')">
                            Tags
                        </x-mkt-navigation.dashboard-link>
                    </div>
                </div>
            </div>
            <div class="hidden md:block">
                <div class="ml-4 flex items-center md:ml-6">
                    <x-mkt-dropdown align="right" width="48">
                        <x-slot name="trigger">
                            <button class="flex text-sm border-2 border-transparent rounded-full focus:outline-none focus:border-gray-300 transition duration-150 ease-in-out">
                                <img class="h-8 w-8 rounded-full object-cover" src="{{ Auth::user()->profile_photo_url }}" alt="{{ Auth::user()->name }}" />
                            </button>
                        </x-slot>
                        <x-slot name="content">
                            <x-mkt-dropdown.link href="{{ route('marketplaceful::portal.home', ['user' => Auth::user()]) }}">
                                Your Profile
                            </x-mkt-dropdown.link>
                            <form method="POST" action="{{ route('logout') }}">
                                @csrf

                                <x-mkt-dropdown.link href="{{ route('logout') }}"
                                                    onclick="event.preventDefault();
                                                                this.closest('form').submit();">
                                    Sign Out
                                </x-mkt-dropdown.link>
                            </form>
                        </x-slot>
                    </x-mkt-dropdown>
                </div>
            </div>

            <!-- Hamburger -->
            <div class="-mr-2 flex md:hidden">
                <button @click="open = !open" class="inline-flex items-center justify-center p-2 rounded-md text-gray-500 hover:text-gray-700 hover:bg-gray-100 focus:outline-none focus:bg-gray-600 focus:text-gray-900" x-bind:aria-label="open ? 'Close main menu' : 'Main menu'" x-bind:aria-expanded="open">
                    <svg class="h-6 w-6" stroke="currentColor" fill="none" viewBox="0 0 24 24">
                        <path :class="{'hidden': open, 'inline-flex': !open }" class="inline-flex" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                        <path :class="{'hidden': !open, 'inline-flex': open }" class="hidden" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </button>
            </div>
        </div>
    </div>

    <!-- Responsive Navigation Menu -->
    <div :class="{'block': open, 'hidden': !open}" class="hidden md:hidden">
        <div class="px-2 pt-2 pb-3 sm:px-3 space-y-1">
            <x-mkt-navigation.responsive-dashboard-link href="{{ route('marketplaceful::tags.index') }}" :active="request()->routeIs('marketplaceful::tags.index')">
                Tags
            </x-mkt-navigation.responsive-dashboard-link>
        </div>
        <div class="pt-4 pb-3 border-t border-gray-100">
            <div class="flex items-center px-5">
                <div class="flex-shrink-0">
                    <img class="h-10 w-10 rounded-full" src="{{ Auth::user()->profile_photo_url }}" alt="{{ Auth::user()->name }}" />
                </div>
                <div class="ml-3">
                    <div class="text-base font-medium leading-none text-gray-900">{{ Auth::user()->name }}</div>
                    <div class="mt-1 text-sm font-medium leading-none text-gray-500">{{ Auth::user()->email }}</div>
                </div>
            </div>
            <div class="mt-3 px-2" role="menu" aria-orientation="vertical" aria-labelledby="user-menu" role="menuitem">
                <x-mkt-navigation.responsive-dashboard-link href="{{ route('marketplaceful::portal.home', ['user' => Auth::user()]) }}">
                    Your Profile
                </x-mkt-navigation.responsive-dashboard-link>
                <form method="POST" action="{{ route('logout') }}">
                    @csrf

                    <x-mkt-navigation.responsive-dashboard-link href="{{ route('logout') }}"
                                    onclick="event.preventDefault();
                                                this.closest('form').submit();">
                        Sign Out
                    </x-mkt-navigation.responsive-dashboard-link>
                </form>
            </div>
        </div>
    </div>
</nav>
