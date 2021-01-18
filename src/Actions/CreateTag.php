<?php

namespace Marketplaceful\Actions;

use Illuminate\Support\Facades\Validator;
use Marketplaceful\Models\Tag;

class CreateTag
{
    public function create($user, array $input)
    {
        Validator::make($input, [
            'name' => ['required', 'string', 'max:255'],
            'slug' => ['nullable', 'string', 'max:255', 'unique:tags'],
        ])->validateWithBag('createTag');

        $tag = Tag::create([
            'name' => $input['name'],
            'slug' => $input['slug'] ?? null,
        ]);

        return $tag;
    }
}
