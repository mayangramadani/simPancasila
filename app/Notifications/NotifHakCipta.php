<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class NotifHakCipta extends Notification
{
    use Queueable;

    private $revisi_data;
    /**
     * Create a new notification instance.
     *
     * @return void
     */

    public function __construct($revisi_data)
    {
        $this->revisi_data = $revisi_data;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function via($notifiable)
    {
        return ['mail', 'database'];
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
            ->greeting('Perubahan Status')
            ->line($this->revisi_data['message']);
    }

    /**
     * Get the array representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function toDatabase($notifiable)
    {
        return [
            'review_id' => $this->revisi_data['review_id'],
            'message' => $this->revisi_data['message'],
        ];
    }
}
