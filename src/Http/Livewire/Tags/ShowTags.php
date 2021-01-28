<?php

namespace Marketplaceful\Http\Livewire\Tags;

use Livewire\Component;
use Livewire\WithPagination;
use Marketplaceful\Models\Tag;

class ShowTags extends Component
{
    use WithPagination;

    public function render()
    {
        return view('marketplaceful::livewire.tags.show-tags', [
            'tags' => Tag::withCount('listings')->paginate(10),
        ])->layout('marketplaceful::layouts.base');
    }
}
