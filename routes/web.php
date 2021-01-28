<?php

use Illuminate\Support\Facades\Route;
use Marketplaceful\Http\Livewire\Portal\Conversations\ShowConversation;
use Marketplaceful\Http\Livewire\Portal\Conversations\ShowConversations;
use Marketplaceful\Http\Livewire\Portal\Home;
use Marketplaceful\Http\Livewire\Portal\Listings\CreateListing;
use Marketplaceful\Http\Livewire\Portal\Listings\ShowCheckout;
use Marketplaceful\Http\Livewire\Portal\Listings\ShowListing;
use Marketplaceful\Http\Livewire\Portal\Listings\ShowListings;
use Marketplaceful\Http\Livewire\Portal\Orders\ShowOrder;
use Marketplaceful\Http\Livewire\Portal\Orders\ShowOrders;
use Marketplaceful\Http\Livewire\Portal\Profile\ShowProfile;
use Marketplaceful\Http\Livewire\Portal\Sales\ShowSale;
use Marketplaceful\Http\Livewire\Portal\Sales\ShowSales;
use Marketplaceful\Http\Livewire\Tags\CreateTag;
use Marketplaceful\Http\Livewire\Tags\ShowTag;
use Marketplaceful\Http\Livewire\Tags\ShowTags;
use Marketplaceful\Http\Middleware\Authorize;
use Marketplaceful\Http\Middleware\UpdateUserLastSeenMiddleware;

Route::group(['middleware' => 'web'], function () {
    Route::group(['middleware' => ['auth', 'verified', Authorize::class, UpdateUserLastSeenMiddleware::class]], function () {
        Route::get('/marketplaceful', fn () => redirect()->to(route('marketplaceful::listings.index')))->name('marketplaceful::dashboard');

        Route::get('/marketplaceful/tags', ShowTags::class)->name('marketplaceful::tags.index');
        Route::get('/marketplaceful/tags/create', CreateTag::class)->name('marketplaceful::tags.create');
        Route::get('/marketplaceful/tags/{tag}', ShowTag::class)->name('marketplaceful::tags.show');
    });

    Route::group(['middleware' => ['auth', 'verified', UpdateUserLastSeenMiddleware::class]], function () {
        Route::get('/portal', Home::class)->name('marketplaceful::portal.home');
        Route::get('/portal/profile', ShowProfile::class)->name('marketplaceful::portal.profile');
        Route::get('/portal/listings', ShowListings::class)->name('marketplaceful::portal.listings.index');
        Route::get('/portal/listings/create', CreateListing::class)->name('marketplaceful::portal.listings.create');
        Route::get('/portal/listings/{listing}', ShowListing::class)->name('marketplaceful::portal.listings.show');
        Route::get('/portal/listings/{listing}/checkout', ShowCheckout::class)->name('marketplaceful::portal.listings.checkout.show');

        Route::get('/portal/conversations', ShowConversations::class)->name('marketplaceful::portal.conversations.index');
        Route::get('/portal/conversations/{conversation:uuid}', ShowConversation::class)->name('marketplaceful::portal.conversations.show');

        Route::get('/portal/orders', ShowOrders::class)->name('marketplaceful::portal.orders.index');
        Route::get('/portal/orders/{order}', ShowOrder::class)->name('marketplaceful::portal.orders.show');

        Route::get('/portal/sales', ShowSales::class)->name('marketplaceful::portal.sales.index');
        Route::get('/portal/sales/{order}', ShowSale::class)->name('marketplaceful::portal.sales.show');
    });
});
