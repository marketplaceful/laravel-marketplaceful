<?php

namespace Marketplaceful\Http\Livewire\Portal\Profile;

use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use Livewire\WithFileUploads;
use Marketplaceful\Actions\UpdateUser;

class UpdateProfileInformationForm extends Component
{
    use WithFileUploads;

    public $state = [];

    public $photo;

    public function mount()
    {
        $this->state = Auth::user()->withoutRelations()->toArray();
    }

    public function updateProfileInformation(UpdateUser $updater)
    {
        $this->resetErrorBag();

        $updater->update(
            Auth::user(),
            $this->photo
                ? array_merge($this->state, ['photo' => $this->photo])
                : $this->state
        );

        if (isset($this->photo)) {
            return redirect()->route('marketplaceful::portal.profile');
        }

        $this->emit('saved');
    }

    public function deleteProfilePhoto()
    {
        Auth::user()->deleteProfilePhoto();
    }

    public function getUserProperty()
    {
        return Auth::user();
    }

    public function render()
    {
        return view('marketplaceful::livewire.portal.profile.update-profile-information-form');
    }
}
