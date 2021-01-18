<?php

namespace Marketplaceful\Actions;

use Illuminate\Support\Facades\Gate;
use Marketplaceful\Models\Order;

class CreateOrder
{
    public function create($user, $listing)
    {
        // Gate::forUser($user)->authorize('createOrder', $listing);

        $order = Order::create([
            'listing_id' => $listing->id,
            'customer_id' => $user->id,
            'provider_id' => $listing->author->id,
            'total_amount' => $listing->price,
        ]);

        return $order;
    }
}
