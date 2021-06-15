<?php

namespace App\Notifications;

use App\Models\Brief;
use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;
use NotificationChannels\Telegram\TelegramChannel;
use NotificationChannels\Telegram\TelegramMessage;

class BriefFilled extends Notification
{
    use Queueable;
    /**
     * @var Brief
     */
    private $brief;

    /**
     * Create a new notification instance.
     *
     * @param Brief $brief
     */
    public function __construct(Brief $brief)
    {
        $this->brief = $brief;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @param mixed $notifiable
     * @return array
     */
    public function via($notifiable)
    {
        return [
            'mail',
//            TelegramChannel::class
        ];
    }

    /**
     * Get the mail representation of the notification.
     *
     * @param mixed $notifiable
     * @return MailMessage
     */
    public function toMail($notifiable)
    {
        return (new MailMessage)->view(
            'emails.brief', ['brief' => $this->brief]
        );
    }

    /**
     * Send telegram notification
     *
     * @param $notifiable
     * @return TelegramMessage
     */
    public function toTelegram($notifiable)
    {
        $url = route('admin.briefs.edit', $this->brief);

        return TelegramMessage::create()
            ->to($notifiable->telegram_user_id)
            ->content(
                "Новый бриф:" .
                "*{$this->brief->body['contact']['f1']}*"
            )
            ->button('Посмотреть', $url);
    }
}
