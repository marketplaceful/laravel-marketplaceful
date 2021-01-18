@props(['href' => null])

@php
$hyperscript = $href ? 'a' : 'button';
@endphp

<{{ $hyperscript }} {{ $attributes->merge(['type' => $href ? null : 'submit', 'href' => $href, 'class' => 'inline-flex justify-center items-center px-4 py-2 border border-transparent text-sm font-medium rounded-md shadow-sm text-white bg-green-500 hover:bg-green-600 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-green-400 disabled:opacity-25 transition ease-in-out duration-150']) }} style="min-width: 80px;">
    {{ $slot }}
</{{ $hyperscript }}>
