<button {{ $attributes->merge(['type' => 'button', 'class' => 'inline-flex items-center justify-center px-4 py-2 bg-red-600 border border-transparent rounded text-sm text-white leading-4 font-medium hover:bg-red-500 focus:outline-none focus:border-red-700 focus:shadow-outline-red active:bg-red-600 transition ease-in-out duration-150']) }} style="min-width: 80px;">
    {{ $slot }}
</button>
