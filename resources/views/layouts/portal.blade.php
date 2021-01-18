<x-mkt-layouts.html class="font-sans text-gray-900 antialiased" :title="isset($title) ? $title . ' - ' . config('app.name') : ''">
    <x-slot name="head">
        <!-- Styles -->
        <link href="https://unpkg.com/filepond/dist/filepond.css" rel="stylesheet">
        <link href="https://unpkg.com/filepond-plugin-image-preview/dist/filepond-plugin-image-preview.css" rel="stylesheet">

        <link rel="stylesheet" href="{{ asset('vendor/marketplaceful/dashboard/css/dashboard.css') }}">

        @livewireStyles

        <!-- Scripts -->
        <script src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.7.0/dist/alpine.js" defer></script>
    </x-slot>

    <div style="max-height: 800px;" class="overflow-y-auto">
        <div class="min-h-screen bg-gray-100">
            <x-mkt-header.portal />

            <main class="-mt-24 pb-8">
                <div class="max-w-3xl mx-auto px-4 sm:px-6 lg:max-w-4xl lg:px-8">
                    {{ $slot }}
                </div>
            </main>
            <footer>
                <div class="max-w-3xl mx-auto px-4 sm:px-6 lg:px-8 lg:max-w-4xl">
                    <div class="border-t border-gray-200 py-8 text-xs text-gray-500 text-center sm:text-left">
                        <span class="inline-flex items-center">
                            Powered by

                            <a href="https://marketplaceful.com" target="_blank" class="ml-2 inline-flex items-center px-2.5 py-1.5 border border-gray-300 shadow-sm text-xs font-medium rounded text-gray-700 bg-white hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-gray-500">
                                <svg class="-ml-0.5 mr-2 h-4 w-4" viewBox="0 0 42 42" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path fill-rule="evenodd" d="M17.924 0.849998L16.97 1.018V1.017C1.44999 3.832 -1.84001 8.353 0.843995 24.037L1.014 25.004C3.82 40.5 8.03999 43.78 23.542 41.204L25.006 40.949C41.04 38.043 43.865 33.519 41.032 17.449L40.946 16.971C38.163 1.632 33.656 -1.682 18.852 0.694998L17.924 0.849998ZM32.296 14.568C31.3787 13.5227 30.0667 13 28.36 13C27.208 13 26.1733 13.2667 25.256 13.8C24.36 14.312 23.6667 15.016 23.176 15.912C22.7493 14.888 22.1413 14.152 21.352 13.704C20.584 13.2347 19.6347 13 18.504 13C17.4587 13 16.52 13.2133 15.688 13.64C14.8773 14.0667 14.216 14.6853 13.704 15.496V15.176C13.704 14.5147 13.4907 14.0027 13.064 13.64C12.6373 13.256 12.104 13.064 11.464 13.064C10.7813 13.064 10.1947 13.256 9.704 13.64C9.23467 14.024 9 14.568 9 15.272V27.016C9 27.7627 9.23467 28.328 9.704 28.712C10.1733 29.096 10.7493 29.288 11.432 29.288C12.1147 29.288 12.68 29.096 13.128 28.712C13.5973 28.328 13.832 27.7627 13.832 27.016V20.296C13.832 19.1867 14.0987 18.3227 14.632 17.704C15.1653 17.0853 15.88 16.776 16.776 16.776C17.5013 16.776 18.0347 16.9893 18.376 17.416C18.7387 17.8213 18.92 18.536 18.92 19.56V27.016C18.92 27.7627 19.1547 28.328 19.624 28.712C20.0933 29.096 20.6693 29.288 21.352 29.288C22.056 29.288 22.632 29.096 23.08 28.712C23.528 28.328 23.752 27.7627 23.752 27.016V20.296C23.752 19.1867 24.0187 18.3227 24.552 17.704C25.0853 17.0853 25.8 16.776 26.696 16.776C27.4213 16.776 27.9547 16.9893 28.296 17.416C28.6587 17.8213 28.84 18.536 28.84 19.56V27.016C28.84 27.7627 29.0747 28.328 29.544 28.712C30.0133 29.096 30.5893 29.288 31.272 29.288C31.976 29.288 32.552 29.096 33 28.712C33.448 28.328 33.672 27.7627 33.672 27.016V19.624C33.672 17.2773 33.2133 15.592 32.296 14.568Z" fill="currentColor" />
                                </svg>

                                Marketplaceful
                            </a>
                        </span>
                    </div>
                </div>
            </footer>
        </div>
    </div>

    @stack('modals')

    @livewireScripts

    <script src="https://unpkg.com/filepond-plugin-image-preview/dist/filepond-plugin-image-preview.js"></script>
    <script src="https://unpkg.com/filepond/dist/filepond.js"></script>
</x-mkt-layouts.html>
