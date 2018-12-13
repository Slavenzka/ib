<?php

namespace App\Mail;

use App\Models\Contact\Brief;
use App\Models\User\User;
use Carbon\Carbon;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class BriefFilled extends Mailable
{
    use Queueable, SerializesModels;
    /**
     * @var Brief
     */
    public $brief;

	/**
	 * Create a new message instance.
	 *
	 * @param Brief $brief
	 */
    public function __construct(Brief $brief)
    {
        $this->brief = $brief;
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
            ->subject('Новый бриф. ' . Carbon::now()->format('d.m.Y H:i'))
            ->view('mail.brief');
    }
}
