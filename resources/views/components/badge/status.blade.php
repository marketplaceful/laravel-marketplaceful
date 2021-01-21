@props([
    'color',
])

@php
    $colorClasses = [
        'green' => 'bg-green-100 text-green-800',
        'pink' => 'bg-pink-100 text-pink-800',
        'red' => 'bg-red-100 text-red-800',
        'gray' => 'bg-gray-100 text-gray-800',
        'yellow' => 'bg-yellow-100 text-yellow-800',
    ]
@endphp

<span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium leading-4 {{ $colorClasses[$color] }} uppercase tracking-wider">
    {{ $slot }}
</span>
