@props(['active'])

@php
$classes = ($active ?? false)
            ? 'whitespace-nowrap py-4 px-1 border-b-2 border-green-500 font-medium text-sm leading-5 text-gray-900 focus:outline-none focus:text-green-800 focus:border-green-700'
            : 'whitespace-nowrap py-4 px-1 border-b-2 border-transparent font-medium text-sm leading-5 text-gray-500 hover:text-gray-700 hover:border-gray-300 focus:outline-none focus:text-gray-700 focus:border-gray-300';
@endphp

<a {{ $attributes->merge(['class' => $classes]) }}>
    {{ $slot }}
</a>
