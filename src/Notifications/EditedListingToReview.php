<?php

namespace Marketplaceful\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class EditedListingToReview extends Notification implements ShouldQueue
{
    use Queueable;

    public $listing;

    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct($listing)
    {
        $this->listing = $listing;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function via($notifiable)
    {
        return ['mail'];
    }

    /**
     * Get the mail representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return \Illuminate\Notifications\Messages\MailMessage
     */
    public function toMail($notifiable)
    {
        return (new MailMessage)
            ->subject("Edited listing to review: \"{$this->listing->title}\" by {$this->listing->author->name}")
            ->greeting("Hi {$notifiable->name},")
            ->line("There is an edited listing to review: \"{$this->listing->title}\" by {$this->listing->author->name}. You now have to approve or reject that listing.");
    }

    /**
     * Get the array representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function toArray($notifiable)
    {
        return [
            //
        ];
    }
}
