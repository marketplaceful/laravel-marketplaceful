<?php

namespace Marketplaceful\Http\Livewire\Tags;

use Livewire\Component;
use Marketplaceful\Models\Tag;

class ShowTag extends Component
{
    public Tag $tag;

    public function render()
    {
        return view('marketplaceful::livewire.tags.show-tag')
            ->layout('marketplaceful::layouts.base');
    }
}
