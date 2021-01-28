<div class="md:grid md:grid-cols-3 md:gap-6" {{ $attributes }}>
    <x-mkt-form.dashboard-section-title>
        <x-slot name="title">{{ $title }}</x-slot>
        @if (isset($description))
            <x-slot name="description">{{ $description }}</x-slot>
        @endif
    </x-mkt-form.dashboard-section-title>

    <div class="mt-5 md:mt-0 md:col-span-2">
        <div class="px-4 py-5 sm:p-6 bg-white border border-gray-100 sm:rounded">
            {{ $content }}
        </div>
    </div>
</div>
