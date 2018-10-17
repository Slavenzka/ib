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
