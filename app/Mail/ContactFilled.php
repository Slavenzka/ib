<?php

namespace App\Mail;

use App\Models\Contact\Contact;
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
	private $contact;

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
        return $this->view('view.name');
    }
}
