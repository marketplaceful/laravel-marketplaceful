<nav x-data="{ open: false }" class="bg-white border-b border-gray-200">
    <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex justify-between h-16">
            <div class="flex">
                <div class="flex-shrink-0 flex items-center">
                    <a href="/" class="bg-white p-1 rounded-full text-gray-400 hover:text-gray-500 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-gray-500 mr-3">
                        <svg class="h-6 w-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7" />
                        </svg>
                    </a>
                    <a href="/">
                        <svg class="h-8 text-gray-800" viewBox="0 0 42 42" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd" d="M17.924 0.849998L16.97 1.018V1.017C1.44999 3.832 -1.84001 8.353 0.843995 24.037L1.014 25.004C3.82 40.5 8.03999 43.78 23.542 41.204L25.006 40.949C41.04 38.043 43.865 33.519 41.032 17.449L40.946 16.971C38.163 1.632 33.656 -1.682 18.852 0.694998L17.924 0.849998ZM32.296 14.568C31.3787 13.5227 30.0667 13 28.36 13C27.208 13 26.1733 13.2667 25.256 13.8C24.36 14.312 23.6667 15.016 23.176 15.912C22.7493 14.888 22.1413 14.152 21.352 13.704C20.584 13.2347 19.6347 13 18.504 13C17.4587 13 16.52 13.2133 15.688 13.64C14.8773 14.0667 14.216 14.6853 13.704 15.496V15.176C13.704 14.5147 13.4907 14.0027 13.064 13.64C12.6373 13.256 12.104 13.064 11.464 13.064C10.7813 13.064 10.1947 13.256 9.704 13.64C9.23467 14.024 9 14.568 9 15.272V27.016C9 27.7627 9.23467 28.328 9.704 28.712C10.1733 29.096 10.7493 29.288 11.432 29.288C12.1147 29.288 12.68 29.096 13.128 28.712C13.5973 28.328 13.832 27.7627 13.832 27.016V20.296C13.832 19.1867 14.0987 18.3227 14.632 17.704C15.1653 17.0853 15.88 16.776 16.776 16.776C17.5013 16.776 18.0347 16.9893 18.376 17.416C18.7387 17.8213 18.92 18.536 18.92 19.56V27.016C18.92 27.7627 19.1547 28.328 19.624 28.712C20.0933 29.096 20.6693 29.288 21.352 29.288C22.056 29.288 22.632 29.096 23.08 28.712C23.528 28.328 23.752 27.7627 23.752 27.016V20.296C23.752 19.1867 24.0187 18.3227 24.552 17.704C25.0853 17.0853 25.8 16.776 26.696 16.776C27.4213 16.776 27.9547 16.9893 28.296 17.416C28.6587 17.8213 28.84 18.536 28.84 19.56V27.016C28.84 27.7627 29.0747 28.328 29.544 28.712C30.0133 29.096 30.5893 29.288 31.272 29.288C31.976 29.288 32.552 29.096 33 28.712C33.448 28.328 33.672 27.7627 33.672 27.016V19.624C33.672 17.2773 33.2133 15.592 32.296 14.568Z" fill="currentColor"></path>
                        </svg>
                    </a>
                </div>
            </div>
            <div class="hidden sm:ml-6 sm:flex sm:items-center">
                <a href="{{ route('marketplaceful::portal.messages.index') }}" class="bg-white p-1 rounded-full text-gray-400 hover:text-gray-500 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-gray-500">
                    <span class="sr-only">View messages</span>
                    <svg class="h-6 w-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 12h.01M12 12h.01M16 12h.01M21 12c0 4.418-4.03 8-9 8a9.863 9.863 0 01-4.255-.949L3 20l1.395-3.72C3.512 15.042 3 13.574 3 12c0-4.418 4.03-8 9-8s9 3.582 9 8z" />
                    </svg>
                </a>
                <!-- Profile dropdown -->
                <div @click.away="open = false" class="ml-3 relative" x-data="{ open: false }">
                    <div>
                        <button @click="open = !open" class="max-w-xs bg-white flex items-center text-sm rounded-full focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-gray-500" id="user-menu" aria-haspopup="true" x-bind:aria-expanded="open">
                            <span class="sr-only">Open user menu</span>
                            <img class="h-8 w-8 rounded-full" src="{{ \Auth::user()->profile_photo_url }}" alt="">
                        </button>
                    </div>
                    <transition enter-active-class="transition ease-out duration-200" enter-class="transform opacity-0 scale-95" enter-to-class="transform opacity-100 scale-100" leave-active-class="transition ease-in duration-75" leave-class="transform opacity-100 scale-100" leave-to-class="transform opacity-0 scale-95">
                        <div x-show="open" x-description="Profile dropdown panel, show/hide based on dropdown state." class="origin-top-right absolute right-0 mt-2 w-48 rounded-md shadow-lg py-1 bg-white ring-1 ring-black ring-opacity-5" role="menu" aria-orientation="vertical" aria-labelledby="user-menu">
                            <a href="{{ route('marketplaceful::portal.home') }}" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100" role="menuitem">
                                Dashboard
                            </a>
                            <a href="{{ route('marketplaceful::portal.profile') }}" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100" role="menuitem">
                                Profile
                            </a>

                            <form method="POST" action="{{ route('logout') }}">
                                @csrf

                                <a href="{{ route('logout') }}"
                                    onclick="event.preventDefault();
                                                this.closest('form').submit();"
                                    class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100"
                                    role="menuitem">
                                    Sign out
                                </a>
                            </form>
                        </div>
                    </transition>
                </div>
                <a href="{{ route('marketplaceful::portal.listings.create') }}" class="ml-4 inline-flex items-center justify-center px-4 py-2 border border-gray-300 shadow-sm text-sm font-medium rounded-md text-gray-700 bg-white hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-offset-gray-100 focus:ring-gray-500">
                    New listing
                </a>
            </div>
            <div
                class="-mr-2 flex items-center sm:hidden">
                <!-- Mobile menu button -->
                <button @click="open = !open" class="bg-white inline-flex items-center justify-center p-2 rounded-md text-gray-400 hover:text-gray-500 hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-gray-500" x-bind:aria-expanded="open">
                    <span class="sr-only">Open main menu</span>
                    <svg x-state:on="Menu open" x-state:off="Menu closed" :class="{ 'hidden': open, 'block': !open }" class="block h-6 w-6" x-description="Heroicon name: outline/menu" xmlns="http://www.w3.org/2000/svg" fill="none" viewbox="0 0 24 24" stroke="currentColor" aria-hidden="true">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"></path>
                    </svg>
                    <svg x-state:on="Menu open" x-state:off="Menu closed" :class="{ 'hidden': !open, 'block': open }" class="hidden h-6 w-6" x-description="Heroicon name: outline/x" xmlns="http://www.w3.org/2000/svg" fill="none" viewbox="0 0 24 24" stroke="currentColor" aria-hidden="true">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                    </svg>
                </button>
            </div>
        </div>
    </div>
    <div x-description="Mobile menu, toggle classes based on menu state." x-state:on="Open" x-state:off="closed" :class="{ 'block': open, 'hidden': !open }" class="hidden sm:hidden">
        <div class="pt-4 pb-3 border-t border-gray-200">
            <div class="flex items-center px-4">
                <div class="flex-shrink-0">
                    <img class="h-10 w-10 rounded-full" src="{{ \Auth::user()->profile_photo_url }}" alt="">
                </div>
                <div class="ml-3">
                    <div class="text-base font-medium text-gray-800">Tom Cook</div>
                    <div class="text-sm font-medium text-gray-500">tom@example.com</div>
                </div>
                <button class="ml-auto bg-white flex-shrink-0 p-1 rounded-full text-gray-400 hover:text-gray-500 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-gray-500">
                    <span class="sr-only">View notifications</span>
                    <svg class="h-6 w-6" x-description="Heroicon name: outline/bell" xmlns="http://www.w3.org/2000/svg" fill="none" viewbox="0 0 24 24" stroke="currentColor" aria-hidden="true">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 17h5l-1.405-1.405A2.032 2.032 0 0118 14.158V11a6.002 6.002 0 00-4-5.659V5a2 2 0 10-4 0v.341C7.67 6.165 6 8.388 6 11v3.159c0 .538-.214 1.055-.595 1.436L4 17h5m6 0v1a3 3 0 11-6 0v-1m6 0H9"></path>
                    </svg>
                </button>
            </div>
            <div class="mt-3 space-y-1">
                <a href="#" class="block px-4 py-2 text-base font-medium text-gray-500 hover:text-gray-800 hover:bg-gray-100">
                    Your Profile
                </a>
                <a href="#" class="block px-4 py-2 text-base font-medium text-gray-500 hover:text-gray-800 hover:bg-gray-100">
                    Settings
                </a>
                <a href="#" class="block px-4 py-2 text-base font-medium text-gray-500 hover:text-gray-800 hover:bg-gray-100">
                    Sign out
                </a>
            </div>
        </div>
    </div>
</nav>
