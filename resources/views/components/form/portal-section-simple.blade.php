@props(['submit'])

<div class="w-full max-w-lg mx-auto">
    <form {{ $attributes }} wire:submit.prevent="{{ $submit }}">
        <div class="px-4 space-y-6 sm:p-0">
            <x-mkt-form.portal-section-title>
                <x-slot name="title">{{ $title }}</x-slot>

                @if (isset($description))
                    <x-slot name="description">{{ $description }}</x-slot>
                @endif
            </x-mkt-form.portal-section-title>

            <div class="grid grid-cols-3 gap-6">
                {{ $form }}
            </div>

            @if (isset($actions))
                <div class="flex justify-end">
                    {{ $actions }}
                </div>
            @endif
        </div>
    </form>
</div>
