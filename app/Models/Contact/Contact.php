<?php

namespace App\Models\Contact;

use Illuminate\Database\Eloquent\Model;

class Contact extends Model
{
    public static $STATUSES = [
        'progress' => 'В обработке',
        'no_dial' => 'Недозвон',
        'finished' => 'Завершен',
        'declined' => 'Отклонен',
    ];

    protected $fillable = [
        'name',
        'phone',
        'email',
        'message',
		'comment',
        'status',
    ];

	/**
	 * @param $query
	 * @return mixed
	 */
	public function scopeProcessing($query)
	{
		return $query->where('status', 'progress')->orWhere('status', 'no_dial');
	}
}
