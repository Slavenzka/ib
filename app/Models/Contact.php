<?php

namespace App\Models\Contact;

use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\Contact\Contact
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
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Contact\Contact newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Contact\Contact newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Contact\Contact processing()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Contact\Contact query()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Contact\Contact whereComment($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Contact\Contact whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Contact\Contact whereEmail($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Contact\Contact whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Contact\Contact whereMessage($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Contact\Contact whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Contact\Contact wherePhone($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Contact\Contact whereStatus($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Contact\Contact whereUpdatedAt($value)
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
