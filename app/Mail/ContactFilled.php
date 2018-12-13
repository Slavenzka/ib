<?php

namespace App\Mail;

use App\Models\Contact\Contact;
use App\Models\User\User;
use Carbon\Carbon;
use Illuminate\Mail\Mailable;

class ContactFilled extends Mailable
{
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
