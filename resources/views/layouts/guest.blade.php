<x-mkt-layouts.html class="font-sans text-gray-900 antialiased" :title="isset($title) ? $title . ' - ' . config('app.name') : ''">
    <x-slot name="head">
        <!-- Styles -->
        <link rel="stylesheet" href="{{ asset('vendor/marketplaceful/dashboard/css/dashboard.css') }}">

        <!-- Scripts -->
        <script src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.7.0/dist/alpine.js" defer></script>
    </x-slot>

    {{ $slot }}
</x-mkt-layouts.html>
