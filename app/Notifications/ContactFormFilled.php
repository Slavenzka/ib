<?php

namespace App\Notifications;

use App\Models\Contact;
use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;
use NotificationChannels\Telegram\TelegramChannel;
use NotificationChannels\Telegram\TelegramMessage;

class ContactFormFilled extends Notification
{
    use Queueable;

    /**
     * @var Contact
     */
    public $contact;

    /**
     * Create a new notification instance.
     *
     * @param Contact $contact
     */
    public function __construct(Contact $contact)
    {
        $this->contact = $contact;
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
            'emails.contact', ['contact' => $this->contact]
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
        $url = route('admin.contacts.edit', $this->contact);

        return TelegramMessage::create()
            ->to($notifiable->telegram_user_id)
            ->content(
                "Новый контакт:\n" .
                "*{$this->contact->name}*\n" .
                "[{$this->contact->email}](mailto:{$this->contact->email})\n" .
                "{$this->contact->phone}"
            )
            ->button('Посмотреть', $url);
    }
}
