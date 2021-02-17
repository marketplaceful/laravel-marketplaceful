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

    {{ $slot }}

    @stack('modals')

    @livewireScripts

    <script src="https://unpkg.com/filepond-plugin-image-preview/dist/filepond-plugin-image-preview.js"></script>
    <script src="https://unpkg.com/filepond/dist/filepond.js"></script>
</x-mkt-layouts.html>
