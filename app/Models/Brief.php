<?php

namespace App\Models\Contact;

use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\Contact\Brief
 *
 * @property int $id
 * @property array $body
 * @property string $status
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Contact\Brief newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Contact\Brief newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Contact\Brief processing()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Contact\Brief query()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Contact\Brief whereBody($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Contact\Brief whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Contact\Brief whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Contact\Brief whereStatus($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Contact\Brief whereUpdatedAt($value)
 * @mixin \Eloquent
 */
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
