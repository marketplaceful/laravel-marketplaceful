@props(['submit'])

<form {{ $attributes }} wire:submit.prevent="{{ $submit }}">
    <div class="rounded-lg bg-white overflow-hidden shadow">
        <div class="bg-white py-6 px-4 space-y-6 sm:p-6">
            <x-mkt-form.portal-section-title>
                <x-slot name="title">{{ $title }}</x-slot>
                @if (isset($description))
                    <x-slot name="description">{{ $description }}</x-slot>
                @endif
            </x-mkt-form.portal-section-title>

            <div class="grid grid-cols-3 gap-6">
                {{ $form }}
            </div>
        </div>

        @if (isset($actions))
            <div class="flex items-center justify-end px-4 py-3 bg-gray-50 text-right sm:px-6">
                {{ $actions }}
            </div>
        @endif
    </div>
</form>
