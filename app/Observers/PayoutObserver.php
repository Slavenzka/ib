<?php

namespace App\Observers;

use App\Models\Payout;
use Auth;

class PayoutObserver
{
    /**
     * Handle the payout "created" event.
     *
     * @param Payout $payout
     * @return void
     */
    public function created(Payout $payout)
    {
        $this->handle($payout);
    }

    /**
     * Handle the payout "updated" event.
     *
     * @param Payout $payout
     * @return void
     */
    public function updated(Payout $payout)
    {
        $this->handle($payout);
    }

    /**
     * Handle the payout "deleted" event.
     *
     * @param Payout $payout
     * @return void
     */
    public function deleted(Payout $payout)
    {
        $this->handle($payout);
    }

    /**
     * @param Payout $payout
     */
    private function handle(Payout $payout): void
    {
        $payout->histories()->create([
            'user_id' => Auth::user()->id,
            'payload' => $payout->toJson()
        ]);
    }
}
