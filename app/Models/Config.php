<?php

namespace App\Models;

use Eloquent;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\Config
 *
 * @method static Builder|Config newModelQuery()
 * @method static Builder|Config newQuery()
 * @method static Builder|Config query()
 * @mixin Eloquent
 */
class Config extends Model
{
    public static $TYPES = [
        'shop' => [
            'uk' => 'Інтернет магазин',
            'ru' => 'Интернет магазин',
            'en' => 'E-commerce',
        ],
        'landing' => [
            'uk' => 'Лендінг',
            'ru' => 'Лендинг',
            'en' => 'Landing page',
        ],
        'promo' => [
            'uk' => 'Промо-сайт',
            'ru' => 'Промо-сайт',
            'en' => 'Promo',
        ],
        'marketing' => [
            'uk' => 'Маркетіниг',
            'ru' => 'Маркетинг',
            'en' => 'Marketing'
        ],
        'application' => [
            'uk' => 'Застосунок',
            'ru' => 'Приложение',
            'en' => 'Application',
        ],
        'complex' => [
            'uk' => 'Комплексний проект',
            'ru' => 'Комплексный проект',
            'en' => 'Complex project'
        ]
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
