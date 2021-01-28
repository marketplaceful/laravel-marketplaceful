<div class="min-h-screen bg-white">
    <x-mkt-navbar />

    <!-- Page Heading -->
    <header class="bg-gray-50">
        <div class="max-w-5xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="border-t border-gray-100">
                {{ $header }}
            </div>
        </div>
    </header>

    <!-- Page Content -->
    <main class="border-t border-gray-100">
        {{ $slot }}
    </main>
</div>

@stack('modals')
