<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\Base
 *
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Base newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Base newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Base query()
 * @mixin \Eloquent
 */
class Base extends Model
{
    public static $currencies = [
        'UAH', 'USD', 'EUR'
    ];

    public static $statuses = [
        'pending', 'in_progress', 'awaiting_payment', 'finished', 'canceled_without_payment', 'canceled_with_payment', 'frozen'
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
