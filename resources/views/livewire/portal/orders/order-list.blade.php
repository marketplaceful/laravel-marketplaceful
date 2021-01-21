<div class="rounded border border-gray-200 divide-y divide-y divide-gray-200 overflow-hidden">
    @foreach($orders as $order)
        @php
            $path = auth()->user()->providesOrder($order)
                ? route('marketplaceful::portal.sales.show', $order)
                : route('marketplaceful::portal.orders.show', $order);
        @endphp
        <a href="{{ $path }}" class="flex justify-between bg-white hover:bg-gray-100 p-4">
            <div>
                <div class="font-bold text-gray-600">
                    @if (auth()->user()->providesOrder($order))
                        {{ $order->customer->name }}
                    @else
                        {{ $order->provider->name }}
                    @endif
                </div>
                <p class="text-gray-600 flex items-center">
                    <span>{{ $order->listing->title }}</span>
                </p>
            </div>
            <div class="text-right space-y-1">
                <div>
                    <x-mkt-badge.status :color="$order->status_color">
                        {{ $order->status_label }}
                    </x-mkt-badge.status>
                </div>
                <div class="font-bold text-gray-600">
                    {{ $order->created_at->format('M j') }}
                </div>
            </div>
        </a>
    @endforeach
</div>
