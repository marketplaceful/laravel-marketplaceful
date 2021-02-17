<?php

namespace Marketplaceful\Http\Livewire\Portal\Listings;

use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use Marketplaceful\Actions\CreateConversation;
use Marketplaceful\Models\Listing;

class ContactForm extends Component
{
    public Listing $listing;

    public $message;

    public function createConversation(CreateConversation $creator)
    {
        $this->resetErrorBag();

        $conversation = $creator->create(Auth::user(), $this->listing, ['body' => $this->message]);

        return redirect(route('marketplaceful::portal.conversations.show', $conversation));
    }

    public function render()
    {
        return view('marketplaceful::livewire.portal.listings.contact-form')
            ->layout('marketplaceful::layouts.portal');
    }
}
