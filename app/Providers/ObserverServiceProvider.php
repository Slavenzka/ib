<?php

namespace App\Providers;

use App\Models\Payment;
use App\Models\Payout;
use App\Observers\PaymentObserver;
use App\Observers\PayoutObserver;
use Illuminate\Support\ServiceProvider;

class ObserverServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        Payment::observe(PaymentObserver::class);
        Payout::observe(PayoutObserver::class);
    }
}
