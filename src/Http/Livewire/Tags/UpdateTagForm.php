<?php

namespace Marketplaceful\Http\Livewire\Tags;

use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use Marketplaceful\Actions\UpdateTag;

class UpdateTagForm extends Component
{
    public $tag;

    public $state = [];

    public function mount($tag)
    {
        $this->tag = $tag;

        $this->state = $tag->withoutRelations()->toArray();
        ;
    }

    public function updateTag(UpdateTag $updater)
    {
        $this->resetErrorBag();

        $updater->update(
            Auth::user(),
            $this->tag,
            $this->state,
        );

        $this->emit('saved');
    }

    public function getUserProperty()
    {
        return Auth::user();
    }

    public function render()
    {
        return view('marketplaceful::livewire.tags.update-tag-form');
    }
}
