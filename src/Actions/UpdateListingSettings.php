<?php

namespace Marketplaceful\Actions;

use Illuminate\Support\Facades\Validator;

class UpdateListingSettings
{
    public function update($user, $listing, array $input)
    {
        // Gate::forUser($user)->authorize('update', $team);

        Validator::make($input, [
            'slug' => ['nullable', 'string', 'max:255', 'unique:listings,slug,'.$listing->id],
            'featured' => ['nullable', 'boolean'],
        ])->validateWithBag('updateListingSettings');

        $listing->forceFill([
            'slug' => $input['slug'],
            'featured' => $input['featured'],
        ])->save();
    }
}
