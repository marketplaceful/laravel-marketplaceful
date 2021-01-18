@props(['active'])

@php
$classes = ($active ?? false)
            ? 'text-gray-900 text-sm font-medium rounded-md px-3 py-2 transition duration-150 ease-in-out'
            : 'text-gray-500 text-sm font-medium rounded-md px-3 py-2 hover:text-gray-700 transition duration-150 ease-in-out';
@endphp

<a {{ $attributes->merge(['class' => $classes]) }}>
    {{ $slot }}
</a>
