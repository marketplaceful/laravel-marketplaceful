@props(['active'])

@php
$classes = ($active ?? false)
            ? 'px-3 py-2 rounded text-sm font-medium text-gray-900 bg-gray-200 focus:outline-none focus:text-white focus:bg-green-600 transition duration-150 ease-in-out'
            : 'px-3 py-2 rounded text-sm font-medium text-gray-500 hover:text-gray-700 hover:bg-gray-100 focus:outline-none focus:text-gray-900 focus:bg-gray-600 transition duration-150 ease-in-out';
@endphp

<a {{ $attributes->merge(['class' => $classes]) }}>
    {{ $slot }}
</a>
