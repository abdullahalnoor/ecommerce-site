<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;

class PlaceOrderMail extends Notification
{
    use Queueable;

    protected $invoceData;

    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct($invoceData)
    {
        $this->invoceData = $invoceData;
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
       
        ->from('bondclothinghousebd@gmail.com')
        ->cc($notifiable->email)
        ->bcc($notifiable->email)
        ->subject('Place Order...')
        // ->action('Place Order',route('frontend.home'))
        ->markdown('customer.emails.place-order',
        [
            'url'=> route('frontend.home'),
            'user'=>$notifiable,
            'invoceData'=>$this->invoceData,
        ]);
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
