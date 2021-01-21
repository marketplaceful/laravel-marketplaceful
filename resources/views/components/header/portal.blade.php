<header x-data="{ open: false }" class="pb-24 bg-white border-b border-gray-200">
    <div class="max-w-3xl mx-auto px-4 sm:px-6 lg:max-w-4xl lg:px-8">
        <!-- Return -->
        <div class="w-full pt-5">
            <a href="/" class="text-gray-900 text-sm font-medium flex items-center" aria-current="page">
                <svg class="h-3 w-3 mr-1" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
                    <path fill-rule="evenodd" d="M9.707 16.707a1 1 0 01-1.414 0l-6-6a1 1 0 010-1.414l6-6a1 1 0 011.414 1.414L5.414 9H17a1 1 0 110 2H5.414l4.293 4.293a1 1 0 010 1.414z" clip-rule="evenodd" />
                </svg>

                Return to Marketplaceful
            </a>
        </div>
        <div class="relative flex flex-wrap items-center justify-center lg:justify-between py-5 lg:py-0">
            <!-- Logo -->
            <div class="absolute left-0 py-5 flex-shrink-0 lg:static">
                <a href="/">
                    <span class="sr-only">Workflow</span>
                    <svg class="h-8 w-auto text-gray-800" viewBox="0 0 42 42" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path fill-rule="evenodd" d="M17.924 0.849998L16.97 1.018V1.017C1.44999 3.832 -1.84001 8.353 0.843995 24.037L1.014 25.004C3.82 40.5 8.03999 43.78 23.542 41.204L25.006 40.949C41.04 38.043 43.865 33.519 41.032 17.449L40.946 16.971C38.163 1.632 33.656 -1.682 18.852 0.694998L17.924 0.849998ZM32.296 14.568C31.3787 13.5227 30.0667 13 28.36 13C27.208 13 26.1733 13.2667 25.256 13.8C24.36 14.312 23.6667 15.016 23.176 15.912C22.7493 14.888 22.1413 14.152 21.352 13.704C20.584 13.2347 19.6347 13 18.504 13C17.4587 13 16.52 13.2133 15.688 13.64C14.8773 14.0667 14.216 14.6853 13.704 15.496V15.176C13.704 14.5147 13.4907 14.0027 13.064 13.64C12.6373 13.256 12.104 13.064 11.464 13.064C10.7813 13.064 10.1947 13.256 9.704 13.64C9.23467 14.024 9 14.568 9 15.272V27.016C9 27.7627 9.23467 28.328 9.704 28.712C10.1733 29.096 10.7493 29.288 11.432 29.288C12.1147 29.288 12.68 29.096 13.128 28.712C13.5973 28.328 13.832 27.7627 13.832 27.016V20.296C13.832 19.1867 14.0987 18.3227 14.632 17.704C15.1653 17.0853 15.88 16.776 16.776 16.776C17.5013 16.776 18.0347 16.9893 18.376 17.416C18.7387 17.8213 18.92 18.536 18.92 19.56V27.016C18.92 27.7627 19.1547 28.328 19.624 28.712C20.0933 29.096 20.6693 29.288 21.352 29.288C22.056 29.288 22.632 29.096 23.08 28.712C23.528 28.328 23.752 27.7627 23.752 27.016V20.296C23.752 19.1867 24.0187 18.3227 24.552 17.704C25.0853 17.0853 25.8 16.776 26.696 16.776C27.4213 16.776 27.9547 16.9893 28.296 17.416C28.6587 17.8213 28.84 18.536 28.84 19.56V27.016C28.84 27.7627 29.0747 28.328 29.544 28.712C30.0133 29.096 30.5893 29.288 31.272 29.288C31.976 29.288 32.552 29.096 33 28.712C33.448 28.328 33.672 27.7627 33.672 27.016V19.624C33.672 17.2773 33.2133 15.592 32.296 14.568Z" fill="currentColor" />
                    </svg>
                </a>
            </div>
            <div class="w-full py-5 lg:border-t lg:border-gray-200">
                <!-- Top nav -->
                <div class="hidden lg:block">
                    <nav class="flex space-x-4">
                        <x-mkt-navigation.portal-link href="{{ route('marketplaceful::portal.home') }}" :active="request()->routeIs('marketplaceful::portal.home')">
                            {{ __('Home') }}
                        </x-mkt-navigation.portal-link>

                        <x-mkt-navigation.portal-link href="{{ route('marketplaceful::portal.listings.create') }}" :active="request()->routeIs('marketplaceful::portal.listings.create')">
                            {{ __('New listing') }}
                        </x-mkt-navigation.portal-link>

                        <x-mkt-navigation.portal-link href="{{ route('marketplaceful::portal.listings.index') }}" :active="request()->routeIs('marketplaceful::portal.listings.index')">
                            {{ __('Listings') }}
                        </x-mkt-navigation.portal-link>

                        <x-mkt-navigation.portal-link href="{{ route('marketplaceful::portal.conversations.index') }}" :active="request()->routeIs('marketplaceful::portal.conversations.index')">
                            {{ __('Conversations') }}
                        </x-mkt-navigation.portal-link>

                        <x-mkt-navigation.portal-link href="{{ route('marketplaceful::portal.orders.index') }}" :active="request()->routeIs('marketplaceful::portal.orders.index')">
                            {{ __('Orders') }}
                        </x-mkt-navigation.portal-link>

                        <x-mkt-navigation.portal-link href="{{ route('marketplaceful::portal.sales.index') }}" :active="request()->routeIs('marketplaceful::portal.sales.index')">
                            {{ __('Sales') }}
                        </x-mkt-navigation.portal-link>

                        <x-mkt-navigation.portal-link href="{{ route('marketplaceful::portal.profile') }}" :active="request()->routeIs('marketplaceful::portal.profile')">
                            {{ __('Profile') }}
                        </x-mkt-navigation.portal-link>

                        <!-- Authentication -->
                        <form method="POST" class="flex" action="{{ route('logout') }}">
                            @csrf

                            <x-mkt-navigation.portal-link href="{{ route('logout') }}"
                                        onclick="event.preventDefault();
                                            this.closest('form').submit();">
                                {{ __('Logout') }}
                            </x-mkt-navigation.portal-link>
                        </form>
                    </nav>
                </div>
            </div>
            <!-- Menu button -->
            <div
                class="absolute right-0 flex-shrink-0 lg:hidden">
                <!-- Mobile menu button -->
                <button @click="open = !open" class="bg-transparent p-2 rounded-md inline-flex items-center justify-center text-gray-500 hover:text-gray-700 focus:outline-none focus:ring-2 focus:ring-white" x-bind:aria-expanded="open" aria-expanded="false">
                    <span class="sr-only">Open main menu</span>
                    <svg x-state:on="Menu open" x-state:off="Menu closed" :class="{ 'hidden': open, 'block': !open }" class="block h-6 w-6" x-description="Heroicon name: menu" xmlns="http://www.w3.org/2000/svg" fill="none" viewbox="0 0 24 24" stroke="currentColor" aria-hidden="true">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"></path>
                    </svg>
                    <svg x-state:on="Menu open" x-state:off="Menu closed" :class="{ 'hidden': !open, 'block': open }" class="hidden h-6 w-6" x-description="Heroicon name: x" xmlns="http://www.w3.org/2000/svg" fill="none" viewbox="0 0 24 24" stroke="currentColor" aria-hidden="true">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                    </svg>
                </button>
            </div>
        </div>
    </div>
    <transition enter-active-class="duration-150 ease-out" enter-class="opacity-0" enter-to-class="opacity-100" leave-active-class="duration-150 ease-in" leave-class="opacity-100" leave-to-class="opacity-0">
        <div x-description="Mobile menu overlay, show/hide based on mobile menu state." x-show="open" class="z-20 fixed inset-0 bg-black bg-opacity-25 lg:hidden" aria-hidden="true"></div>
    </transition>
    <transition enter-active-class="duration-150 ease-out" enter-class="opacity-0 scale-95" enter-to-class="opacity-100 scale-100" leave-active-class="duration-150 ease-in" leave-class="opacity-100 scale-100" leave-to-class="opacity-0 scale-95">
        <div x-description="Mobile menu, show/hide based on mobile menu state." x-show="open" class="z-30 absolute top-0 inset-x-0 max-w-3xl mx-auto w-full p-2 transition transform origin-top lg:hidden">
            <div class="rounded-lg shadow-lg ring-1 ring-black ring-opacity-5 bg-white divide-y divide-gray-200">
                <div class="pt-3 pb-2">
                    <div class="flex items-center justify-between px-4">
                        <div>
                            <svg class="h-8 w-auto text-gray-800" viewBox="0 0 42 42" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path fill-rule="evenodd" d="M17.924 0.849998L16.97 1.018V1.017C1.44999 3.832 -1.84001 8.353 0.843995 24.037L1.014 25.004C3.82 40.5 8.03999 43.78 23.542 41.204L25.006 40.949C41.04 38.043 43.865 33.519 41.032 17.449L40.946 16.971C38.163 1.632 33.656 -1.682 18.852 0.694998L17.924 0.849998ZM32.296 14.568C31.3787 13.5227 30.0667 13 28.36 13C27.208 13 26.1733 13.2667 25.256 13.8C24.36 14.312 23.6667 15.016 23.176 15.912C22.7493 14.888 22.1413 14.152 21.352 13.704C20.584 13.2347 19.6347 13 18.504 13C17.4587 13 16.52 13.2133 15.688 13.64C14.8773 14.0667 14.216 14.6853 13.704 15.496V15.176C13.704 14.5147 13.4907 14.0027 13.064 13.64C12.6373 13.256 12.104 13.064 11.464 13.064C10.7813 13.064 10.1947 13.256 9.704 13.64C9.23467 14.024 9 14.568 9 15.272V27.016C9 27.7627 9.23467 28.328 9.704 28.712C10.1733 29.096 10.7493 29.288 11.432 29.288C12.1147 29.288 12.68 29.096 13.128 28.712C13.5973 28.328 13.832 27.7627 13.832 27.016V20.296C13.832 19.1867 14.0987 18.3227 14.632 17.704C15.1653 17.0853 15.88 16.776 16.776 16.776C17.5013 16.776 18.0347 16.9893 18.376 17.416C18.7387 17.8213 18.92 18.536 18.92 19.56V27.016C18.92 27.7627 19.1547 28.328 19.624 28.712C20.0933 29.096 20.6693 29.288 21.352 29.288C22.056 29.288 22.632 29.096 23.08 28.712C23.528 28.328 23.752 27.7627 23.752 27.016V20.296C23.752 19.1867 24.0187 18.3227 24.552 17.704C25.0853 17.0853 25.8 16.776 26.696 16.776C27.4213 16.776 27.9547 16.9893 28.296 17.416C28.6587 17.8213 28.84 18.536 28.84 19.56V27.016C28.84 27.7627 29.0747 28.328 29.544 28.712C30.0133 29.096 30.5893 29.288 31.272 29.288C31.976 29.288 32.552 29.096 33 28.712C33.448 28.328 33.672 27.7627 33.672 27.016V19.624C33.672 17.2773 33.2133 15.592 32.296 14.568Z" fill="currentColor" />
                            </svg>
                        </div>
                        <div class="-mr-2">
                            <button @click="open = false" type="button" class="bg-white rounded-md p-2 inline-flex items-center justify-center text-gray-400 hover:text-gray-500 hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-inset focus:ring-cyan-500">
                                <span class="sr-only">Close menu</span>
                                <svg class="h-6 w-6" x-description="Heroicon name: x" xmlns="http://www.w3.org/2000/svg" fill="none" viewbox="0 0 24 24" stroke="currentColor" aria-hidden="true">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                                </svg>
                            </button>
                        </div>
                    </div>
                    <div class="mt-3 px-2 space-y-1">
                        <x-mkt-navigation.responsive-portal-link href="{{ route('marketplaceful::portal.home') }}" :active="request()->routeIs('marketplaceful::portal.home')">
                            {{ __('Home') }}
                        </x-mkt-navigation.responsive-portal-link>

                        <x-mkt-navigation.responsive-portal-link href="{{ route('marketplaceful::portal.listings.create') }}" :active="request()->routeIs('marketplaceful::portal.listings.create')">
                            {{ __('New listing') }}
                        </x-mkt-navigation.responsive-portal-link>

                        <x-mkt-navigation.responsive-portal-link href="{{ route('marketplaceful::portal.listings.index') }}" :active="request()->routeIs('marketplaceful::portal.listings.index')">
                            {{ __('Listings') }}
                        </x-mkt-navigation.responsive-portal-link>

                        <x-mkt-navigation.responsive-portal-link href="{{ route('marketplaceful::portal.conversations.index') }}" :active="request()->routeIs('marketplaceful::portal.conversations.index')">
                            {{ __('Conversations') }}
                        </x-mkt-navigation.responsive-portal-link>

                        <x-mkt-navigation.responsive-portal-link href="{{ route('marketplaceful::portal.orders.index') }}" :active="request()->routeIs('marketplaceful::portal.orders.index')">
                            {{ __('Orders') }}
                        </x-mkt-navigation.responsive-portal-link>

                        <x-mkt-navigation.responsive-portal-link href="{{ route('marketplaceful::portal.sales.index') }}" :active="request()->routeIs('marketplaceful::portal.sales.index')">
                            {{ __('Sales') }}
                        </x-mkt-navigation.responsive-portal-link>

                        <x-mkt-navigation.responsive-portal-link href="{{ route('marketplaceful::portal.profile') }}" :active="request()->routeIs('marketplaceful::portal.profile')">
                            {{ __('Profile') }}
                        </x-mkt-navigation.responsive-portal-link>

                        <!-- Authentication -->
                        <form method="POST" action="{{ route('logout') }}">
                            @csrf

                            <x-mkt-navigation.responsive-portal-link href="{{ route('logout') }}"
                                        onclick="event.preventDefault();
                                            this.closest('form').submit();">
                                {{ __('Logout') }}
                            </x-mkt-navigation.responsive-portal-link>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </transition>
</header>
