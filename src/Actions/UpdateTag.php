<?php

namespace Marketplaceful\Actions;

use Illuminate\Support\Facades\Validator;

class UpdateTag
{
    public function update($user, $tag, array $input)
    {
        // Gate::forUser($user)->authorize('update', $team);

        Validator::make($input, [
            'name' => ['required', 'string', 'max:255'],
            'slug' => ['nullable', 'string', 'max:255', 'unique:tags,slug,'.$tag->id],
        ])->validateWithBag('updateTag');

        $tag->forceFill([
            'name' => $input['name'],
            'slug' => $input['slug'] ?? null,
        ])->save();
    }
}
