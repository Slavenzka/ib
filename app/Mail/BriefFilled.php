<?php

namespace App\Mail;

use App\Models\Contact\Brief;
use Carbon\Carbon;
use Illuminate\Mail\Mailable;

class BriefFilled extends Mailable
{
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
            ->to(['talanov.o@gmail.com', '332730eg@gmail.com'])
            ->subject('Новый бриф. ' . Carbon::now()->format('d.m.Y H:i'))
            ->view('mail.brief');
    }
}
