<?php

use Illuminate\Support\Facades\Route;
use Marketplaceful\Http\Livewire\Portal\Home;
use Marketplaceful\Http\Middleware\Authorize;
use Marketplaceful\Http\Livewire\Portal\Profile\ShowProfile;
use Marketplaceful\Http\Livewire\Portal\Listings\ShowListing;
use Marketplaceful\Http\Livewire\Portal\Listings\ShowListings;
use Marketplaceful\Http\Livewire\Portal\Listings\CreateListing;
use Marketplaceful\Http\Middleware\UpdateUserLastSeenMiddleware;

Route::group(['middleware' => 'web'], function () {
    Route::group(['middleware' => ['auth', 'verified', Authorize::class, UpdateUserLastSeenMiddleware::class]], function () {

    });

    Route::group(['middleware' => ['auth', 'verified', UpdateUserLastSeenMiddleware::class]], function () {
        Route::get('/portal', Home::class)->name('marketplaceful::portal.home');
        Route::get('/portal/profile', ShowProfile::class)->name('marketplaceful::portal.profile');
        Route::get('/portal/listings', ShowListings::class)->name('marketplaceful::portal.listings.index');
        Route::get('/portal/listings/create', CreateListing::class)->name('marketplaceful::portal.listings.create');
        Route::get('/portal/listings/{listing}', ShowListing::class)->name('marketplaceful::portal.listings.show');
    });
});
