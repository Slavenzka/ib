<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\Config
 *
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Config newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Config newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Config query()
 * @mixin \Eloquent
 */
class Config extends Model
{
    public static $TYPES = [
        'shop' => [
            'ru' => 'Интернет магазин',
            'en' => 'E-commerce',
        ],
        'landing' => [
            'ru' => 'Лендинг',
            'en' => 'Landing page',
        ],
        'promo' => [
            'ru' => 'Промо-сайт',
            'en' => 'Promo',
        ],
    ];

    public static $TECHS = [
        'java' => 'JAVA',
        'swift' => 'Swift',
        'react' => 'React',
        'azure' => 'Azure Cloud',
        'aws' => 'AWS Cloud'
    ];

    public static $SOCIAL = [
        'facebook' => 'https://facebook.com',
        'instagram' => 'https://instagram.com',
        'telegram' => 'https://t.me',
    ];
}
