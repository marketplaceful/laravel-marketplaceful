<?php

namespace Marketplaceful\Actions;

use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;
use Marketplaceful\Marketplaceful;
use Marketplaceful\Notifications\EditedListingToReview;

class UpdateListing
{
    public function update($user, $listing, array $input)
    {
        // Gate::forUser($user)->authorize('update', $team);

        Validator::make($input, [
            'title' => ['required', 'string', 'max:255'],
            'price' => ['nullable', 'numeric'],
            'description' => ['nullable', 'string', 'max:1000000000'],
            'image' => ['nullable', 'image', 'max:1024'],
            'photos' => ['nullable', 'array'],
            'photos.*.source' => ['required', 'string'],
            'photos.*.origin' => ['required', Rule::in([1, 3])],
            'uploads' => ['nullable', 'array'],
            'uploads.*' => ['nullable', 'image', 'max:1024'],
            'tags' => ['nullable', 'sometimes', 'array'],
            'tags.*' => ['nullable', 'sometimes', 'exists:tags,id'],
            'location' => ['nullable', 'sometimes', 'array'],
            'location.address' => ['nullable', 'sometimes', 'string'],
            'location.longitude' => ['nullable', 'sometimes', 'numeric', 'between:-180,180'],
            'location.latitude' => ['nullable', 'sometimes', 'numeric', 'between:-90,90'],
        ])->validateWithBag('updateListing');


        if (isset($input['location'])) {
            $listing->updateLocation($input['location']);
        }

        if (isset($input['image'])) {
            $listing->updateFeatureImage($input['image']);
        }

        if (isset($input['photos'])) {
            $listing->updatePhotosFromFilepond($input['photos'], $input['uploads']);
        }

        if (isset($input['tags'])) {
            $listing->tags()->sync(
                collect($input['tags'])->mapWithKeys(
                    fn ($tag, $key) => [$tag => ['order_column' => $key + 1]]
                )
            );
        }

        $listing->forceFill([
            'title' => $input['title'],
            'description' => $input['description'] ?? null,
            'price_for_editing' => $input['price'] ?? null,
        ])->save();

        if (Marketplaceful::hasListingApprovalFeature()) {
            $listing->markAsPendingApproval();

            Marketplaceful::newUserModel()
                ->owner()
                ->first()
                ->notify(new EditedListingToReview($listing));
        }
    }
}
