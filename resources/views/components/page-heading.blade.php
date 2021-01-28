<div {{ $attributes->merge(['class' => 'md:flex md:items-center md:justify-between']) }}>
    <div class="flex-1 min-w-0">
        {{ $slot }}
    </div>

    @if (isset($actions))
        <div class="mt-4 flex md:mt-0 md:ml-4">
            {{ $actions }}
        </div>
    @endif
</div>
