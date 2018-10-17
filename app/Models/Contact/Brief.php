<?php

namespace App\Models\Contact;

use Illuminate\Database\Eloquent\Model;

class Brief extends Model
{
    public static $STATUSES = [
        'progress' => 'В обработке',
        'finished' => 'Завершен',
        'declined' => 'Отклонен',
    ];

    public static $GROUPS = [
        'contact' => 'Информация о компании и контактном лице',
        'company' => 'О компании или бренде',
        'target' => 'Цели создания сайта',
        'group' => 'Целевая аудитория',
        'functional' => 'Общие требования к функциональности сайта',
        'design' => 'Дизайн',
        'hosting' => 'Хостинг и доменное имя',
    ];

    protected $fillable = [
        'name',
        'body',
        'status',
    ];

    protected $casts = [
        'body' => 'array',
    ];

    /**
     * @param $query
     * @return mixed
     */
    public function scopeProcessing($query)
    {
        return $query->where('status', 'progress');
    }
}
