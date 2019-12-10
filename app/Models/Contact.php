<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;


/**
 * App\Models\Contact
 *
 * @property int $id
 * @property string $name
 * @property string $phone
 * @property string $email
 * @property string|null $message
 * @property string|null $comment
 * @property string $status
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Contact newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Contact newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Contact processing()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Contact query()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Contact whereComment($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Contact whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Contact whereEmail($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Contact whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Contact whereMessage($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Contact whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Contact wherePhone($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Contact whereStatus($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Contact whereUpdatedAt($value)
 * @mixin \Eloquent
 */
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
