<?php

namespace App\Observers;

use App\Models\Payment;
use Auth;

class PaymentObserver
{
    /**
     * Handle the payment "created" event.
     *
     * @param Payment $payment
     * @return void
     */
    public function created(Payment $payment)
    {
        $this->handle($payment);
    }

    /**
     * Handle the payment "updated" event.
     *
     * @param Payment $payment
     * @return void
     */
    public function updated(Payment $payment)
    {
        $this->handle($payment);
    }

    /**
     * Handle the payment "deleted" event.
     *
     * @param Payment $payment
     * @return void
     */
    public function deleted(Payment $payment)
    {
        $this->handle($payment);
    }

    /**
     * @param Payment $payment
     */
    private function handle(Payment $payment): void
    {
        $payment->histories()->create([
            'user_id' => Auth::user()->id,
            'payload' => $payment->toJson()
        ]);
    }
}
