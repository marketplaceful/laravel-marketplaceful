<?php

namespace Marketplaceful\Http\Livewire\Tags;

use Livewire\Component;

class CreateTag extends Component
{
    public function render()
    {
        return view('marketplaceful::livewire.tags.create-tag')
            ->layout('marketplaceful::layouts.base');
    }
}
