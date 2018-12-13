<?php

namespace App\Mail;

use App\Models\Contact\Contact;
use App\Models\User\User;
use Carbon\Carbon;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class ContactFilled extends Mailable
{
    use Queueable, SerializesModels;
	/**
	 * @var Contact
	 */
	public $contact;

	/**
	 * Create a new message instance.
	 *
	 * @param Contact $contact
	 */
    public function __construct(Contact $contact)
    {
		$this->contact = $contact;
	}

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this
			->to(User::getUsersEmailsByRoles())
			->replyTo($this->contact->email)
			->subject('Новый контакт. ' . Carbon::now()->format('d.m.Y H:i'))
			->view('mail.contact');
    }
}
