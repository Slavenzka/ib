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
        'laravel' => 'Laravel',
//        'javascript' => 'JavaScript',
        'nodejs' => 'NodeJS',
        'angular' => 'Angular',
        'vue' => 'Vue.js',
        'wordpress' => 'Wordpress',
        'woocommerce' => 'Woocommerce',
        'octobercms' => 'October CMS',
        'sass' => 'Sass',
//        'less' => 'LESS',
    ];

    public static $SOCIAL = [
        'facebook' => 'https://facebook.com',
        'instagram' => 'https://instagram.com',
        'telegram' => 'https://t.me',
    ];
}
