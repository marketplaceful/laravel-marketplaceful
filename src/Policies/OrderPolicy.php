<?php

namespace Marketplaceful\Policies;

use Illuminate\Auth\Access\HandlesAuthorization;
use Marketplaceful\Models\Order;

class OrderPolicy
{
    use HandlesAuthorization;

    /**
     * Create a new policy instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    public function show($user, Order $order)
    {
        return $user->id === $order->customer_id
         || $user->id === $order->provider_id;
    }

    public function create($user, Order $order)
    {
        return $user->id !== $order->provider_id;
    }

    public function createConversation($user, Order $order)
    {
        return $user->id === $order->customer_id
         || $user->id === $order->provider_id;
    }
}
