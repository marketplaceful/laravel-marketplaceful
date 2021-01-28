<?php

namespace Marketplaceful\Http\Livewire\Tags;

use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use Marketplaceful\Actions\CreateTag;

class CreateTagForm extends Component
{
    public $state = [];

    public function createTag(CreateTag $creator)
    {
        $this->resetErrorBag();

        $tag = $creator->create(
            Auth::user(),
            $this->state
        );

        return redirect(route('marketplaceful::tags.show', $tag));
    }

    public function getUserProperty()
    {
        return Auth::user();
    }

    public function render()
    {
        return view('marketplaceful::livewire.tags.create-tag-form');
    }
}
