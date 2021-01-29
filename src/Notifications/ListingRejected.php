<?php

namespace Marketplaceful\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class ListingRejected extends Notification implements ShouldQueue
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
        $marketplace_name = config('app.name');

        return (new MailMessage)
            ->subject("The {$marketplace_name} team has rejected your listing: \"{$this->listing->title}\"")
            ->greeting("Hi {$notifiable->name},")
            ->line("Unfortunately the {$marketplace_name} team has rejected your listing \"{$this->listing->title}\" after reviewing it carefully. You can contact the {$marketplace_name} team to learn more or edit your listing and submit it for a new review.");
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
