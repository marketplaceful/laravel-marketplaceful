<?php

namespace Marketplaceful\Actions;

use Illuminate\Support\Facades\Validator;

class UpdateListingMetadata
{
    public function update($user, $listing, array $input)
    {
        // Gate::forUser($user)->authorize('update', $team);

        Validator::make($input, [
            'public' => ['nullable', 'json'],
            'private' => ['nullable', 'json'],
            'internal' => ['nullable', 'json'],
        ])->validateWithBag('updateListingMetadata');

        $listing->forceFill([
            'public_metadata' => json_decode($input['public']),
            'private_metadata' => json_decode($input['private']),
            'internal_metadata' => json_decode($input['internal']),
        ])->save();
    }
}
