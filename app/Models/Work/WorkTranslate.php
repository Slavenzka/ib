<?php

namespace App\Models\Work;

use Illuminate\Database\Eloquent\Model;

class WorkTranslate extends Model
{
    protected $fillable = [
        'lang',
        'title',
        'description',
        'body',
        'work_id',
    ];
}
