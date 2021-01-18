<div>
    <h3 class="text-lg leading-6 font-medium text-gray-900">{{ $title }}</h3>
    @if (isset($description))
        <p class="mt-1 text-sm text-gray-500">
            {{ $description }}
        </p>
    @endif
</div>
