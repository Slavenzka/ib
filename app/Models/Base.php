<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Base extends Model
{
    public static $currencies = [
        'UAH', 'USD', 'EUR'
    ];

    public static $statuses = [
        'pending', 'in_progress', 'awaiting_payment', 'finished', 'declined', 'frozen'
    ];

    public static $paymentMethods = [
        'cash', 'card'
    ];

    public static $payoutTypes = [
        'inner', 'outer'
    ];

    public static $payoutStatuses = [
        'pending', 'paid'
    ];
}
